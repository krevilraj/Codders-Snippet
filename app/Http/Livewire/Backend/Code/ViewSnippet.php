<?php

namespace App\Http\Livewire\Backend\Code;

use App\Code;
use Livewire\Component;

class ViewSnippet extends Component
{
  public $view_id;
  public $code;

  public function mount($template)
  {
    dd($template);
  }

  public function render()
  {

    return view('livewire.backend.code.view-snippet');
  }
}
