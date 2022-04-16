<?php

namespace App\Http\Controllers;

use App\Models\Critere;
use App\Models\Plan;
use App\Models\Role;
use Illuminate\Http\Request;

class PlanController extends Controller
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
        'plan' => 'required|min:4|max:255',
        'price' => 'required|integer',
        'description' => 'required|max:255',
        'periode' => 'required|integer',
        'role' => 'required',
        'criteres' => 'required',
    ];

    public function index()
    {
        $plans = Plan::latest()->with('criteres')->withCount('pack_users')->get();
        $roles = Role::all();//->where('role', 'NOT LIKE', 'Administrator');

        return view('livewire.backend.plans.plan',compact('plans','roles'));
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

        $plan = Plan::create(array_merge($request->all(), [
            'plan' => \Str::ucfirst(addslashes($request->plan)),
            'description' => \Str::ucfirst(addslashes($request->description)),
            'role' => \Str::ucfirst(addslashes($request->role)),
            'price' => intval($request->price),
            'periode' => intval($request->periode),
        ]));

        if($request->criteres){

            $criteres = explode(",",$request->criteres);

            foreach ($criteres as $critere) {

                $criteres = new Critere([
                    'critere' => $critere,
                ]);

                $plan->criteres()->save($criteres);
            }
        }

        if($request->ajax()){
            return response()->json([
                'message'=>'Plan was created',
            ],200);
        }
        else{
            return back()->with('success','Plan was created');
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


        /* return response()->json([
            'message'=>'Plan was updated',
            'data'=>$request->all(),

        ],422); */

        $request->validate($this->rules);
        $plan = Plan::findOrfail(intval($id));

        $plan->update([
            'plan' => \Str::ucfirst(addslashes($request->plan)),
            'description' => \Str::ucfirst(addslashes($request->description)),
            'role' => \Str::ucfirst(addslashes($request->role)),
            'price' => intval($request->price),
            'periode' => intval($request->periode),
        ]);

        if($request->criteres){

            $criteres = explode(",",$request->criteres);

            foreach ($criteres as $critere) {

                $criteres = new Critere([
                    'critere' => $critere,
                ]);

                $plan->criteres()->save($criteres);
            }
        }

        if($request->ajax()){
            return response()->json([
                'message'=>'Plan was updated',

            ],200);
        }
        else{
            return back()->with('success','Plan was updated.');
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
        $plan = Plan::findOrfail($id);
        $plan->delete();


        return response()->json([
            'message'=>'Plan was deleted',
        ],200);
    }

    /*
        function get_all_substrings($input){
            $subs = array();
            $length = strlen($input);
            for($i=0; $i<$length; $i++){
                for($j=$i; $j<$length; $j++){
                    $subs[] = substr($input, $i, $j);
                }
            }
            return $subs;
        }
    */

    public function getAllSubstrings($input, $delim = ',') {
        return $arr = explode($delim, $input);
        $out = array();
        for ($i = 0; $i < count($arr); $i++) {
            for ($j = $i; $j < count($arr); $j++) {
                $out[] = implode($delim, array_slice($arr, $i, $j - $i + 1));
            }
        }
        return $out;
    }

}
