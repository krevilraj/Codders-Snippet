<?php

namespace App\Http\Livewire\Backend\Template;

use Livewire\Component;

class InstantTemplate extends Component
{
  public $template;
  public $final_template;

  public function render()
  {
    return view('livewire.backend.template.instant-template');
  }

  public function showtemplate(){
    $this->final_template = "asdf".$this->template;
  }

}
