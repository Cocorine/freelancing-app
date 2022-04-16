<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryForm extends Component
{
    public $category, $slug_category, $category_id;
    protected $listeners = ['triggerEdit'];

    public function render()
    {
        return view('livewire.backend.categories.category-form');
    }


    public function save(){
        $this->validate($this->rules);

        if( !$this->category_id){
            // Create Category
            Category::create([
                'category'=> \Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$this->category))),
                'slug-category'=> \Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",'cat_'.$this->category))),
            ]);
            $this->dispactchBrowserEvent('category-saved',['action'=>'store','category_name'=>$this->category->category]);
        }else{
            // Update Category
            Category::find($this->category_id)->update([
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

    public function resetFields(){
        $this->category = '';
    }

}
