<?php

namespace App\Http\Controllers\backend;

use App\Code;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodeController extends Controller
{
  public function showtemplate(Request $request)
  {
    $input = $request->all();
    $code_id = $request->_id;
    $code = Code::find($code_id);
    unset($input['_token']);
    unset($input['_id']);
    $template = $code->template;
    foreach ($input as $key => $value) {
      $search_var = addslashes("$key");
//      echo $key.'-'.$value.'-'.$template;
//      $template = str_replace($search_var, $value, $template);

      $pattern = "/\[$search_var.*\]/U";

      $template = preg_replace($pattern, $value, $template);

    }

    return view('backend.code.view-snippet', compact('template'));
  }

  public function getgroup(Request $request){
    return getGrouplist("%".$request->phrase."%");
  }

}
