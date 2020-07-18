<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
  protected $fillable = [
    'code_id', 'variable', 'type', 'placeholder'
  ];
}
