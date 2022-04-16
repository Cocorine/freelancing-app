<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules = [
        'role' => 'required|min:4|max:255',
    ];

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        $roles = Role::latest()->withCount('users')->get();
        return view('livewire.backend.roles.role',compact('roles'));
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

        Role::create(array_merge($request->all(), [
            'role' => \Str::ucfirst(addslashes($request->role)),
            'slug-role' => 'slug-'.str_replace(' ','-',strtolower(addslashes($request->role))),
        ]));

        if($request->ajax()){
            return response()->json([
                'message'=>'Role was created',

            ],200);
        }
        else{
            return back()->with('success','Role was created');
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
        $role = Role::findOrfail(intval($id));

        $role->update([
            'role' => \Str::ucfirst(addslashes($request->role)),
            'slug-role' => 'slug-'.str_replace(' ','-',strtolower(addslashes($request->role))),
        ]);

        if($request->ajax()){
            return response()->json([
                'message'=>'Role was updated',

            ],200);
        }
        else{
            return back()->with('success','Role was updated.');
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
        $role = Role::findOrfail($id);
        $role->delete();


        return response()->json([
            'message'=>'Role was deleted',
        ],200);
    }
}
