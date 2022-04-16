<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules = [
        'task' => 'required|min:4|max:255',
        'status' => 'required',
        'deadline' => 'required|date',
        'milestone_id' => 'required',
        'description' => 'required',
    ];

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $project = null;
        return view('livewire.backend.projects.manage-project.tasks',compact('project'));
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

        $request->validate($this->rules);

        Task::create([
            'task' => Str::ucfirst(addslashes($request->task)),

            'deadline' => $request->deadline,

            'status' => $request->status,

            'milestone_id' => $request->milestone_id,

            'description' => Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$request->description))),
        ]);

        if($request->ajax()){
            return response()->json([
                'message'=>'Task was created',

            ],200);
        }
        else{
            return back()->with('success','Task was created');
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

        $task = Task::findOrfail(intval($id));

        $task->update([
            'task' => Str::ucfirst(addslashes($request->task)),

            'deadline' => $request->deadline,

            'status' => $request->status,

            'milestone_id' => $request->milestone_id,

            'description' => Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$request->description))),
        ]);

        if($request->ajax()){
            return response()->json([
                'message'=>'Task was updated',

            ],200);
        }
        else{
            return back()->with('success','Task was updated.');
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
        $role = Task::findOrfail($id);
        $role->delete();

        return response()->json([
            'message'=>'Task was deleted',
        ],200);
    }
}
