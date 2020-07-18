<?php

namespace App\Http\Livewire\Backend\Category;

use App\Category;
use Livewire\Component;

class ListCategory extends Component
{
  public $categories;
  protected $listeners = ['updateTable' => 'listCategories', 'deleteRow' => 'deleteRow'];

  // protected $listeners = ['newCategory' => 'listCategories'];
  public function mount()
  {
    $this->listCategories();
  }

  public function render()
  {
    return view('livewire.backend.category.list-category');
  }

  public function listCategories()
  {

    $this->categories = Category::latest()->get();
    $this->emit('refresh_table');
  }

  public function deleteRow($id)
  {
    $id = (int)$id;
    $category = Category::findOrFail($id);
    $category->delete();
    $this->listCategories();
    $this->emit('sweetMessage', ["success","Category deleted successfully 😊"]);
  }

  public function updateRow()
  {
    dd($this->edit_name);
  }




}