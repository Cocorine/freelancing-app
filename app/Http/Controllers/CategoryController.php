<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules = [
        'category' => 'required|min:4|max:255',
    ];

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $categories = Category::latest()->get();
        return view('livewire.backend.categories.category',compact('categories'));
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

        Category::create(array_merge($request->all(), [
            'category' => \Str::ucfirst(addslashes($request->category)),
            'slug-category' => 'slug-'.str_replace(' ','-',strtolower(addslashes($request->category))),
        ]));

        if($request->ajax()){
            return response()->json([
                'message'=>'Category was created',

            ],200);
        }
        else{
            return back()->with('success','Category was created');
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
        $category = Category::findOrfail(intval($id));

        $category->update([
            'category' => \Str::ucfirst(addslashes($request->category)),
            'slug-category' => 'slug-'.str_replace(' ','-',strtolower(addslashes($request->category))),
        ]);

        if($request->ajax()){
            return response()->json([
                'message'=>'Category was updated',
            ],200);
        }
        else{
            return back()->with('success','Category was updated.');
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
        $category = Category::findOrfail($id);
        $category->delete();

        return response()->json([
            'message'=>'Category was deleted',
        ],200);

    }
}
