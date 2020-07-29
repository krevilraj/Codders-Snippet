<?php

namespace App\Http\Livewire\Backend\Code;

use App\Code;
use Livewire\Component;

class ListSnippet extends Component
{
  public $codes;
  public $groups;
  public $search_shortcut;
  public $search_group;
  public $search_title;
  public $search_category;

  protected $listeners = ['updateTable' => 'listSnippet', 'deleteRow'];

  public function mount()
  {
    $this->listSnippet();
  }

  public function render()
  {
    return view('livewire.backend.code.list-snippet');
  }

  public function listSnippet()
  {

    $this->groups = Code::select('group')->groupBy('group')->pluck('group')->toArray();

  }

  public function deleteRow($id)
  {
    $id = (int)$id;
    $code = Code::findOrFail($id);
    $code->delete();
    $this->listSnippet();
    $this->emit('sweetMessage', ["success", "Snippet deleted successfully 😊"]);
  }

  public function getCode($group)
  {
    $data = Code::where('group', $group)->get();
    return $data;
  }
}
