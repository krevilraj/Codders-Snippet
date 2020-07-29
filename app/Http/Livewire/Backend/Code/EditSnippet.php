<?php

namespace App\Http\Livewire\Backend\Code;

use App\Category;
use App\Code;
use App\Variable;
use Livewire\Component;

class EditSnippet extends Component
{
  public $title;
  public $group;
  public $category;
  public $user_category;
  public $template;
  public $shortcode;
  public $code_id;

  public function mount($id)
  {
    $this->code_id = $id;
    $code = Code::find($id);
    $this->title = $code->title;
    $this->group = $code->group;
    $this->user_category = $code->category_id;
    $this->template = $code->template;
    $this->shortcode = $code->shortcode;
    $this->category = Category::all();
    $this->emit('change_editor');
  }

  public function render()
  {
    return view('livewire.backend.code.edit-snippet');
  }

  public function updateSnippet()
  {

    $this->validate([
      'title' => 'required|max:255',
      'user_category' => 'required|max:255',
      'template' => 'required',
    ]);


    $input = [
      'title' => $this->title,
      'category_id' => $this->user_category,
      'template' => $this->template,
      'group' => $this->group,
      'shortcode' => $this->shortcode,
      'user_id' => auth()->user()->id
    ];
    $code = Code::find($this->code_id);
    $code->update($input);

    $variable = [];
    preg_match_all('/\[(.*?)\]/', $this->template, $matches, PREG_OFFSET_CAPTURE);
    foreach ($matches[1] as $data) {
      $variable[] = $data[0];
    }
    $variables = array_unique($variable);
    Variable::where('code_id', $this->code_id)->delete();

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


    $this->emit('reset_editor');
    $this->emit('sweetMessage', ["success", "Category updated successfully 😊"]);


  }
}
