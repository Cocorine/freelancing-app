<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category as Categories;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sortField = 'category';
    public $sortAsc = true;
    public $search = '';
    public $categories, $category, $slug_category, $category_id;
    public $updateCategory = false;

    // app/Http/Livewire/LiveTable.php
    protected $listeners = ['delete'=>'destroy', 'triggerRefresh' => '$refresh'];

    /* protected $listeners = [
        'deleteCategory'=>'destroy',
    ]; */

    // Validation Rules
    protected $rules = [
        'category'=>'required|max:255',
    ];

    public function sortByField($field){

        if($this->sortField === $field){
            $this->sortAsc = !$this->sortAsc;
        }else{
            $this->sortAsc = true;
        }

    }

    public function render()
    {
        //dd(Categories::all());
        return view('livewire.backend.categories.category', [
            'categories' => Categories::search($this->search)//->$this->categories
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate(4),
        ]);
    }

    /* public function render()
    {
        $this->categories = Categories::latest()->get();
        return view('livewire.backend.categories.category');
    } */

    public function store(){

        // Validate Form Request
        $this->validate($this->rules);

        try{
            // Create Category
            Categories::create([
                'category'=> \Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$this->category))),
                'slug-category'=> \Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",'cat_'.$this->category))),

            ]);

            // Set Flash Message
            session()->flash('success','Category Created Successfully!!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
        }catch(\Exception $e){
            // Set Flash Message
            session()->flash('error','Something goes wrong while creating category!!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
    }

    public function save(){
        $this->validate($this->rules);

        if( !$this->category_id){
            // Create Category
            Categories::create([
                'category'=> \Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$this->category))),
                'slug-category'=> \Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",'cat_'.$this->category))),
            ]);
            $this->dispactchBrowserEvent('category-saved',['action'=>'store','category_name'=>$this->category->category]);
        }else{
            // Update Category
            Categories::find($this->category_id)->update([
                'category'=> \Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$this->category))),
                'slug-category'=> \Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",'cat_'.$this->category))),
            ]);
            $this->dispactchBrowserEvent('category-saved',['action'=>'update','category_name'=>$this->category->category]);
        }

        $this->resetFields();
        $this->emitTo('category','triggerRefresh');
    }

    public function triggerEdit($category){
        // /$category = Categories::findOrFail($id);
        $this->category = $category->name;
        $this->slug_category = $category['slug-category'];
        $this->category_id = $category->id;
        $this->updateCategory = true;
        $this->emitTo('dataFetched',$category);
    }

    public function edit($id){
        $category = Categories::findOrFail($id);
        $this->category = $category->name;
        $this->slug_category = $category['slug-category'];
        $this->category_id = $category->id;
        $this->updateCategory = true;
    }

    public function update(){

        // Validate request
        $this->validate();

        try{

            // Update category
            Categories::find($this->category_id)->fill([
                'name'=>$this->name,
                'slug-category'=>$this->description
            ])->save();

            session()->flash('success','Category Updated Successfully!!');

            $this->cancel();
        }catch(\Exception $e){
            session()->flash('error','Something goes wrong while updating category!!');
            $this->cancel();
        }
    }

    public function destroy($id){
        Categories::find($id)->delete();
        $this->dispactchBrowserEvent('category-deleted',['category_name'=>$this->category->category]);
        /* try{
            Categories::find($id)->delete();
            session()->flash('success',"Category Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong while deleting category!!");
        } */
    }

    public function cancel()
    {
        $this->updateCategory = false;
        $this->resetFields();
    }

    public function resetFields(){
        $this->category = '';
    }

}
