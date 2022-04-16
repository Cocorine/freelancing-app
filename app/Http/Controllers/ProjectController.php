<?php

namespace App\Http\Controllers;

use App\Jobs\HireNotificationJob;
use App\Jobs\NewNotificationJob;
use App\Jobs\SendMessageJob;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Country;
use App\Models\File;
use App\Models\Message;
use App\Models\Groupe;
use App\Models\Link;
use App\Models\Milestone;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $project, $message, $projects;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules = [
        'name' => 'required|max:255',
        'description' => 'required',
    ];



    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->project = new Project();
        $this->projects = [];
    }

    public function index()
    {
        if(auth()->user()->isFreelancer()){

            $projects = auth()->user()->user_proposals->sortByDesc('created_at');//->loadCount('users');
            //$projects = auth()->user()->user_proposals->orderBy('desc')->withCount('users')->get();
            //return view('livewire.backend.projects.proposals',compact('projects'));

        }elseif(auth()->user()->isCompagny()){

            $projects = auth()->user()->myProjects->sortByDesc('created_at')->loadCount('users');

        }else{

            $projects = Project::latest()->withCount('users')->get();
        }
        return view('livewire.backend.projects.project',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $countries = Country::all();
        return view('livewire.backend.projects.project-form',compact('categories','countries'));
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

        $project = Project::create([
            'name' => Str::ucfirst(addslashes($request->name)),
            'description' => Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$request->description))),
            'price_type' => $request->price_type == 1 ? 'Fixed' : ($request->price_type == 2 ? 'Hourly' : ($request->price_type == 3 ? 'Biding' :'')),
            'min_price' => intval($request->min_price),
            'start_at' => Carbon::createFromFormat('d/m/Y', $request->start_at)->format('Y-m-d H:i:s'),
            'owner' => auth()->id(),
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'duree' => $request->duree,
            'delay' => Carbon::createFromFormat('d/m/Y', $request->delay)->format('Y-m-d H:i:s'),
            'experience' => $request->experience,
        ]);

        if($request->skills){

            $skills = explode(",",$request->skills);

            foreach ($skills as $expertise) {

                $skill = new Skill([
                    'name' => Str::ucfirst(addslashes($expertise)),
                ]);

                $project->skills()->save($skill);
            }
        }

        if($request->links){

            foreach ($request->links as $link) {

                $url = new Link([
                    'name' => "Lien",
                    'url' => $link,
                ]);

                $project->links()->save($url);
            }
        }

        if($request->cahiers){

            $cahier = $request->cahiers;

            //foreach ($request->cahiers as $cahier) {
                $filename = $request->cahiers->getClientOriginalName().Str::random(2).'.'.time().'.'.$request->cahiers->getClientOriginalExtension();
                $path = $request->cahiers->move('images/cahiers_charges/', $filename);
                $file = new File([
                    'name'=> $filename,
                    'url' => $path,
                ]);
                $project->cahiers()->save($file);
            //}

        }

        if($request->ajax()){
            return response()->json([
                'message'=>'Project was created',

            ],200);
        }
        else{
            return $this->index()->with('success','Project was created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id)->load('skills');
        return view('livewire.backend.projects.manage-project.project-details',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id)->load('skills');
        $categories = Category::latest()->get();
        $countries = Country::all();

        return view('livewire.backend.projects.project-form',compact('categories','countries','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate($this->rules);
        $project = Project::findOrfail(intval($id));

         $project->update([
            'name' => Str::ucfirst(addslashes($request->name)),
            'description' => Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$request->description))),
            'price_type' => $request->price_type == 1 ? 'Fixed' : ($request->price_type == 2 ? 'Hourly' : ($request->price_type == 3 ? 'Biding' :'')),
            'min_price' => intval($request->min_price),
            'start_at' => $request->start_at ? Carbon::createFromFormat('d/m/Y', $request->start_at)->format('Y-m-d H:i:s') : $project->start_at,
            'owner' => auth()->id(),
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'duree' => $request->duree,
            'delay' => $request->delay ? Carbon::createFromFormat('d/m/Y', $request->delay)->format('Y-m-d H:i:s') : $project->delay,
            'experience' => $request->experience,
        ]);

        if($request->skills){

            $skills = explode(",",$request->skills);

            foreach ($skills as $expertise) {

                $skill = new Skill([
                    'name' => Str::ucfirst(addslashes($expertise)),
                ]);

                $project->skills()->save($skill);
            }
        }

        if($request->links){

            foreach ($request->links as $link) {

                $url = new Link([
                    'name' => "Lien",
                    'url' => $link,
                ]);

                $project->links()->save($url);
            }
        }

        if($request->cahiers){

            $cahier = $request->cahiers;

            //foreach ($request->cahiers as $cahier) {
                $filename = $request->cahiers->getClientOriginalName().Str::random(2).'.'.time().'.'.$request->cahiers->getClientOriginalExtension();
                $path = $request->cahiers->move('images/cahiers_charges/', $filename);
                $file = new File([
                    'name'=> $filename,
                    'url' => $path,
                ]);
                $project->cahiers()->save($file);
            //}

        }


        if($request->ajax()){
            return response()->json([
                'message'=>'Project was updated',

            ],200);
        }
        else{
            return $this->index()->with('success','Project was created');
            return back()->with('success','Project was updated.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hireFreelancer(Request $request)
    {

        $proposal = Proposal::findOrfail(intval($request['proposal_id']));

        $proposal->update([
            'hire' => true,
        ]);

        $project = Project::findOrfail($proposal->project_id);

        $project->hire_at = Carbon::now();

        $project->save();

        $this->message = new Message();

        $request['to'] = $proposal->freelancer;

        if($this->message){

            //$group_id = $request->group_id;

            // check if group_id of our request is null or not

            //if($group_id == null){

                $conversations = auth()->user()->direct_conversations;

                if(count($conversations)>0){

                    foreach (auth()->user()->direct_conversations as $conversation) {

                        $ids = [];

                        foreach ($conversation->users->pluck('id') as $value) {
                            array_push($ids,$value);
                        }

                        if(in_array(intval(auth()->id()),$ids) && in_array(intval($request->to),$ids)){
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

                            $group->users()->attach([auth()->id(),$request->to],['in_groupe' => true]);
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

                            $group->users()->attach([auth()->id(),$request->to],['in_groupe' => true]);
                }

                $group_id = $group->id; // pass new group ID to group_id variable for associate to new message

            //}

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

                if($request->file){

                    // attach each file to message

                        // generate new file name

                        $filename = uniqid('message_attached_files_',true).Str::random(5).'.'. $this->message->id.time().Auth::id().$request->file->getClientOriginalName();

                        // set and define file path

                        $path = $request->file->move('conversations/attached_files/'.$this->message->id.'/', $filename);

                        //create file instance

                        $fichier = new File([
                            'name'=> $filename,
                            'url' => $path,
                        ]);

                        // attach file to message

                        $this->message->attached_files()->save($fichier);
                }

            }

            //we will notify to each member of group a new message notification

            //dispatch(new NewNotificationJob($proposal->proposer,$this->message));
            dispatch(new HireNotificationJob($proposal->proposer,$project,$this->message));
            

            if(!$request->ajax()){

                // simple request action response

                return back()->with('success', 'Le message a bien été envoyé.');
            }

            // ajax response

            return response()->json([
                'message' =>  'Le message a bien été envoyé.',
            ]);

        }

        return view('livewire.backend.conversations.conversation',compact('conversations'));

        if($request->ajax()){
            return response()->json([
                'message'=>'Freelancer is hire',

            ],200);
        }
        else{
            return back()->with('success','Freelancer is hire.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrfail($id);
        $project->delete();

        return response()->json([
            'message'=>'Project was deleted',
        ],200);
    }

    public function viewProposals($id){
        $project = Project::find($id)->load('skills');
        return view('livewire.backend.projects.proposals',compact('project'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tasks($id)
    {
        //dd(Milestone::where('project_id',$id)->with('tasks')->get());
        $project = Project::find($id)->load('milestones','milestones.tasks');
        return view('livewire.backend.projects.manage-project.tasks',compact('project'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function milestones($id)
    {
        $project = Project::find($id)->load('milestones');
        return view('livewire.backend.projects.manage-project.milestones',compact('project'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payments($id)
    {
        $project = Project::find($id)->load('skills');
        return view('livewire.backend.projects.manage-project.payments',compact('project'));
    }
}
