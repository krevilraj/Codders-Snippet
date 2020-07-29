<?php

namespace App\Http\Livewire\Backend\Code;

use App\Category;
use App\Code;
use App\Variable;
use Livewire\Component;

class AddSnippet extends Component
{
  public $title;
  public $group;
  public $category;
  public $user_category;
  public $template;
  public $shortcode;

  public function mount()
  {
    $this->category = Category::all();
    $this->user_category = "";
  }

  public function render()
  {
    return view('livewire.backend.code.add-snippet');
  }

  public function addSnippet()
  {

    $this->validate([
      'title' => 'required|max:255',
      'user_category' => 'required|max:255',
      'template' => 'required',
    ]);


    $code = Code::create([
      'title' => $this->title,
      'category_id' => $this->user_category,
      'template' => $this->template,
      'group' => $this->group,
      'shortcode' => $this->shortcode,
      'user_id' => auth()->user()->id
    ]);

    $variable = [];
    preg_match_all('/\[(.*?)\]/', $this->template, $matches, PREG_OFFSET_CAPTURE);
    foreach ($matches[1] as $data) {
//      echo $data[0];
//      $variable[] = explode(',',$data[0]);
      $variable[] = $data[0];

    }
    $variables = array_unique($variable);

    //['name','default_value','placeholder','type']
    foreach ($variables as $variable) {
      $type = 'text';
      $placeholder = '';
      $value = '';
      $field = explode(',', $variable);
      if (isset($field[1])) {
        $value = $field[1];
      }
      if (isset($field[2])) {
        $placeholder = $field[2];
      }
      if (isset($field[3])) {
        $type = $field[3];
      }


//      print_r($field[0]);
//      echo $field[0] .'-'.$type;
//      echo '<br>';
      Variable::create([
        'code_id' => $code->id,
        'value' => $value,
        'name' => $field[0],
        'type' => $type,
        'placeholder' => ucwords($placeholder ? $placeholder : $field[0])
      ]);

    }


    $this->reset();
    $this->category = Category::all();
    $this->emit('reset_editor');
    $this->emit('sweetMessage', ["success", "Category updated successfully 😊"]);


  }
}
