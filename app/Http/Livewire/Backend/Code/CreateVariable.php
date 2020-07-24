<?php

namespace App\Http\Livewire\Backend\Code;

use App\Code;
use Livewire\Component;

class CreateVariable extends Component
{
  public $code;


  public function mount($id)
  {
    $this->code = Code::find($id);
  }

  public function render()
  {
    return view('livewire.backend.code.create-variable');
  }
}
