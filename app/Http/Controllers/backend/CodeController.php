<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function code(){
        return view('backend.Snippet.add-snippet');
    }
}
