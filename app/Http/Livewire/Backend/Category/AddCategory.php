<?php

namespace App\Http\Livewire\Backend\Category;

use App\Category;
use Livewire\Component;

class AddCategory extends Component
{
  public $name;
  public $edit_id=-1;

  protected $listeners = ['editRow'];

  public function render()
  {
    return view('livewire.backend.category.add-category');
  }

  public function updated($field)
  {
    $this->validateOnly($field, ['name' => 'required|max:255']);
  }

  public function addCategory()
  {
    $this->validate(['name' => 'required|max:255']);

    if($this->edit_id ==-1){
      Category::create(['name' => $this->name, 'user_id' => auth()->user()->id]);
      $this->name = "";
      $this->emit('updateTable');
      session()->flash('message', 'Category added successfully 😊');
      $this->emit('sweetMessage', ["success", "Category added successfully 😊"]);
    }else{
      $category = Category::findOrFail($this->edit_id);
      $category->name = $this->name;
      $category->save();
      $this->emit('sweetMessage', ["success", "Category updated successfully 😊"]);
      $this->edit_id=-1;
      $this->name = "";
      $this->emit('updateTable');
    }

  }

  public function editRow($id)
  {
    $id = (int)$id;
    $category = Category::findOrFail($id);
    $this->name = $category->name;
    $this->edit_id = $category->id;
  }
}
