<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Project;
use App\Models\RoleUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules = [
        'milestone' => 'required|min:4|max:255',
        'start_at' => 'required|date',
        'end_at' => 'required|date',
        'budget' => 'required|integer',
        'project_id' => 'required',
        'description' => 'required',
    ];

    public function index()
    {
        $project = null;
        $this->authorize('viewAll', $project);
        return view('livewire.backend.projects.manage-project.milestones',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::findOrfail($request->project_id);

        if(!$project){
            if($request->ajax()){
                return response()->json([
                    'message'=>'Project not found',
    
                ],404);
            }
            else{
                return back()->withErrors('Project not found');
            }
        }

        $this->authorize('create');

        $request->validate($this->rules);

        Milestone::create([
            'milestone' => Str::ucfirst(addslashes($request->milestone)),

            'start_at' => $request->start_at,

            'end_at' => $request->end_at,

            'budget' => $request->budget,

            'progress' => $request->progress,

            'project_id' => $request->project_id,

            'description' => Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$request->description))),
        ]);

        if($request->ajax()){
            return response()->json([
                'message'=>'Milestone was created',

            ],200);
        }
        else{
            return back()->with('success','Milestone was created');
        }
    }

    public function unblockMilestone(Request $request){

        $milestone = Milestone::findOrfail($request->milestone_id);

        $user = RoleUser::where('role_id',1)->first()->user;

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $milestone = Milestone::findOrfail(intval($id));

        $this->authorize('update', $milestone);

        $milestone->update([
            'milestone' => Str::ucfirst(addslashes($request->milestone)),

            'start_at' => $request->start_at,

            'end_at' => $request->end_at,

            'budget' => $request->budget,

            'progress' => $request->progress,

            'project_id' => $request->project_id,

            'description' => Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$request->description))),
        ]);

        if($request->ajax()){
            return response()->json([
                'message'=>'Milestone was updated',

            ],200);
        }
        else{
            return back()->with('success','Milestone was updated.');
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
        $milestone = Milestone::findOrfail($id);

        $this->authorize('update', $milestone);

        $milestone->delete();

        return response()->json([
            'message'=>'Milestone was deleted',
        ],200);
    }
}
