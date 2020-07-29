<?php

namespace App\Http\Livewire\Backend\Code;

use App\Category;
use App\Code;
use Livewire\Component;

class CategoryWise extends Component
{

  public $category;
  public $codes;
  public $groups;
  protected $listeners = [ 'deleteRow'];
  public function mount($category_id)
  {
    $this->category = Category::find($category_id);
    $this->category_id = $category_id;
    $this->groups = Code::select('group')->groupBy('group')->where('category_id',$category_id)->pluck('group')->toArray();
  }

  public function render()
  {
    return view('livewire.backend.code.category-wise');
  }
  public function deleteRow($id)
  {
    $id = (int)$id;
    $code = Code::findOrFail($id);
    $code->delete();
    $this->emit('sweetMessage', ["success", "Snippet deleted successfully 😊"]);
  }

}
