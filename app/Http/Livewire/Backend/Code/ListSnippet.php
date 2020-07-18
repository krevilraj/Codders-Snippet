<?php

namespace App\Http\Livewire\Backend\Code;

use App\Code;
use Livewire\Component;

class ListSnippet extends Component
{
  public $codes;
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

    $this->codes = Code::latest()->get();
    $this->emit('refresh_table');
  }

  public function deleteRow($id)
  {
    $id = (int)$id;
    $code = Code::findOrFail($id);
    $code->delete();
    $this->listSnippet();
    $this->emit('sweetMessage', ["success","Snippet deleted successfully 😊"]);
  }
}
