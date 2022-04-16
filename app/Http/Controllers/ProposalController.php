<?php

namespace App\Http\Controllers;

use App\Jobs\NewProposalJob;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{

    protected $rules = [
        'price' => 'required|integer',
        'description' => 'required',
        'delay' => 'required',
        'project_id' => 'required',
    ];


    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $proposal = auth()->user()->user_proposals->where('project_id',intval($request->project_id))->first();

        if($proposal){
            return response()->json([
                'message'=>'Sorry!!! You can\'t submit for another proposal',
            ],500);
        }

        $proposal = Proposal::create(array_merge($request->all(), [
            'freelancer' => auth()->id(),
        ]));

        $user = $proposal->project->project_owner;

        //dd($user);

        dispatch(new NewProposalJob($user,$proposal->project));

        if($request->ajax()){
            return response()->json([
                'message'=>'Proposal was send successful',
            ],200);
        }
        else{
            return back()->with('success','Proposal was send successful');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proposal = Proposal::findOrfail($id);
        $proposal->delete();

        return response()->json([
            'message'=>'Proposal was deleted',
        ],200);
    }
}
