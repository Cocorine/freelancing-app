<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Jobs\NewNotificationJob;
use App\Models\Message;
use App\Models\Groupe;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConversationController extends Controller
{

    protected $message, $groupe;

    protected $rules = [

        "content" => 'sometimes|max:255',

        //"attached_files" => 'sometimes|mimes:csv,png,jpeg,jpg,txt,xlx,xls,pdf,docx,doc,zip|max:2048',

        "to" => 'sometimes|required',
    ];

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function inbox(){

        $conversations = auth()->user()->conversations()->with(['groupe_users' => function($query){
            $query->where('user_id',auth()->id())->withCount(['messages'=> function($query){
                $query->where('from','!=',auth()->id())->where('is_read',false)->where('read_at',null);
            }]);
        }])->get();

        return view('livewire.backend.conversations.conversation',compact('conversations'));
    }

    public function show($id){

        $this->groupe = Groupe::findOrfail($id);

        if($this->groupe){
            $conversation = $this->groupe->load('users','illustration','funder');

            $messages = $this->groupe->messages()->with('attached_files','author','conversation','parent'/* ,'messages_read_by_group_users','groupe_users.groupe_users_as_read_message' */)->latest()->get();

            //$data = $this->paginate($messages,1000);

            //$messages = $data;

            $number = 0;

            $conversations = auth()->user()->conversations()->with(['groupe_users' => function($query){
                $query->where('user_id',auth()->id())->withCount(['messages'=> function($query){
                    $query->where('from','!=',auth()->id())->where('is_read',false)->where('read_at',null);
                }]);
            }])->get();

            return view('livewire.backend.conversations.conversation',compact('conversation','conversations','messages'));

        }

        abort(404);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate($this->rules);

        $this->message = new Message();

        if($this->message){
            $group_id = $request->group_id;

            // check if group_id of our request is null or not

            if($group_id == null){

                $conversations = auth()->user()->direct_conversations;

                if(count($conversations)>0){

                    foreach (auth()->user()->direct_conversations as $conversation) {

                        $ids = [];

                        foreach ($conversation->users->pluck('id') as $value) {
                            array_push($ids,$value);
                        }

                        if(in_array(intval(auth()->id()),$ids) && in_array(intval($request->to[0]),$ids)){
                            $group  = $conversation;
                        }
                        else{

                            // if group_id is null it suppose that is a direct discussion message

                            // So we will create a new group

                            $group = Groupe::create([
                                'type' =>'pair', // type group is set at pair because of direct discussion attribute
                                'owner' => auth()->id(), // ID of message sender
                            ]);

                            //attach group members to group include funder

                            $group->users()->attach([auth()->id(),$request->to[0]],['in_groupe' => true]);
                        }
                    }
                }
                else{

                            // if group_id is null it suppose that is a direct discussion message

                            // So we will create a new group

                            $group = Groupe::create([
                                'type' =>'pair', // type group is set at pair because of direct discussion attribute
                                'owner' => auth()->id(), // ID of message sender
                            ]);

                            //attach group members to group include funder

                            $group->users()->attach([auth()->id(),$request->to[0]],['in_groupe' => true]);
                }

                $group_id = $group->id; // pass new group ID to group_id variable for associate to new message

            }

            // attach message to sender

            $request['from'] = auth()->id();

            // attach message to him group conversation

            $request['groupe_id'] = $group_id;

            /**
             *
             * set message content
             *
             * But before we will encode message context for avoid encode character
            */

            $request['content'] = Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$request->content)));

            //  then we will fill each request field with message

            $this->message->fill($request->all());

            // and save message

            $this->message->save();

            $guids=$this->message->conversation->groupe_users;

            $this->message->groupe_users()->attach($guids->pluck('id'));

            // check if request content files

            if(isset($request->files)){

                // check if request content files data

                if($request->attached_files){

                    // attach each file to message

                    foreach ($request->attached_files as $key => $attached_file) {

                        // generate new file name

                        $filename = uniqid('message_attached_files_',true).Str::random(5).'.'. $this->message->id.time().auth()->id().$attached_file->getClientOriginalName();

                        // set and define file path

                        $path = $attached_file->move('conversations/attached_files/'.$this->message->id.'/', $filename);

                        //create file instance

                        $fichier = new File([
                        'name'=> $filename,
                        'url' => $path,
                        ]);

                        // attach file to message

                        $this->message->attached_files()->save($fichier);
                    }
                }

            }

            //we will notify to each member of group a new message notification

            foreach ($this->message->conversation->actif_groupe_members as $user) {

                /**
                 * The notification we will send through job tasks
                 * Dispach function we will put tasks on queue listen
                 *
                 * this task will send en background without interrupt the actual sending message process
                 *
                 * Queue tasks is running in background and don't affect our function
                 *
                 *  that will send notification in background
                 */

                dispatch(new NewNotificationJob($user,$this->message));
            }

            if(!$request->ajax()){

                // simple request action response

                return back()->with('success', 'Le message a bien été envoyé.');
            }

            // ajax response

            return response()->json([
                'message' =>  'Le message a bien été envoyé.',
            ]);

        }
    }

    public function markHasRead(Request $request){

        $this->groupe = Groupe::findOrfail($request['id']);

        if(!$this->groupe){

            return response()->json([
                'message' =>  'Conversation not found',
                'data'  => 'Conversation not found',
            ]);
        }

        $groupe_users =  $this->groupe->groupe_users->where('user_id',auth()->id())->first()->load(['messages'=>function($query){
            $query->where('from','!=',auth()->id());
        }]);

        foreach ($groupe_users['messages'] as $key => $message) {

            $message->pivot->is_read = true;
            $message->pivot->read_at = Carbon::now();
            $message->pivot->save();
        }

        return response()->json([
            'data' =>  $groupe_users,

        ]);
        return response()->json([
            'message' =>  'Success',
        ]);



    }


    public function deleteFiles(Request $request,$id){

        $fichier = File::findOrfail($request->id);

        if($fichier){
            $path = public_path().'/'.optional($fichier)->url;

            if(\File::exists($path)){
                \File::delete($path);
            }

            optional($fichier)->delete();

        }

        return response()->json([
            'message' =>  'success',
            'data'  =>'data',
        ]);
    }

    public function send_message(Request $request)
    {

        //dd( $request->all() );
        $request->validate([
            "content" => 'sometimes|max:255',
            "to" => 'sometimes|required',
        ]);

        $this->message = new Message();

        if($this->message){
            $group_id = $request->group_id;


            // check if group_id of our request is null or not

            if($group_id == null){

                $conversations = auth()->user()->direct_conversations;

                if(count($conversations)>0){

                    foreach (auth()->user()->direct_conversations as $conversation) {

                        $ids = [];

                        foreach ($conversation->users->pluck('id') as $value) {
                            array_push($ids,$value);
                        }

                        if(in_array(intval(auth()->id()),$ids) && in_array(intval($request->to[0]),$ids)){
                            $group  = $conversation;
                        }
                        else{

                            // if group_id is null it suppose that is a direct discussion message

                            // So we will create a new group

                            $group = Groupe::create([
                                'type' =>'pair', // type group is set at pair because of direct discussion attribute
                                'owner' => auth()->id(), // ID of message sender
                            ]);

                            //attach group members to group include funder

                            $group->users()->attach([auth()->id(),$request->to[0]],['in_groupe' => true]);
                        }
                    }
                }
                else{

                            // if group_id is null it suppose that is a direct discussion message

                            // So we will create a new group

                            $group = Groupe::create([
                                'type' =>'pair', // type group is set at pair because of direct discussion attribute
                                'owner' => auth()->id(), // ID of message sender
                            ]);

                            //attach group members to group include funder

                            $group->users()->attach([auth()->id(),$request->to[0]],['in_groupe' => true]);
                }

                $group_id = $group->id; // pass new group ID to group_id variable for associate to new message

            }

            // attach message to sender

            $request['from'] = auth()->id();

            // attach message to him group conversation

            $request['groupe_id'] = $group_id;

            /**
             *
             * set message content
             *
             * But before we will encode message context for avoid encode character
            */

            $request['content'] = Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$request->content)));

            //  then we will fill each request field with message

            //dd( $request->all() );

            $this->message->fill($request->all());

            // and save message

            $this->message->save();

            $guids=$this->message->conversation->groupe_users;

            $this->message->groupe_users()->attach($guids->pluck('id'));

            // check if request content files

            if(isset($request->files)){

                // check if request content files data

                if($request->attached_files){

                    // attach each file to message

                    foreach ($request->attached_files as $key => $attached_file) {

                        // generate new file name

                        $filename = uniqid('message_attached_files_',true).Str::random(10).'.'. $this->message->id.time().auth()->id().$attached_file->getClientOriginalName();

                        // set and define file path

                        $path = $attached_file->move('discusssions/groupes/group_'.$this->message->conversation->name.'/messages//j'.$this->message->id.'/', $filename);

                        //create file instance

                        $fichier = new File([
                        'name'=> $filename,
                        'url' => $path,
                        ]);

                        // attach file to message

                        $this->message->attached_files()->save($fichier);
                    }
                }

            }

            //we will notify to each member of group a new message notification

            foreach ($this->message->conversation->actif_groupe_members as $user) {

                /**
                 * The notification we will send through job tasks
                 * Dispach function we will put tasks on queue listen
                 *
                 * this task will send en background without interrupt the actual sending message process
                 *
                 * Queue tasks is running in background and don't affect our function
                 *
                 *  that will send notification in background
                */

                dispatch(new NewNotificationJob($user,$this->message));
            }

            if(!$request->ajax()){

                // simple request action response

                return back()->with('success', 'Le message a bien été envoyé.');
            }

            // ajax response

            return response()->json([
                'message' =>  'success',
                'data'  =>'data',
            ]);

        }
    }
}
