<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
  protected $fillable = [
    'title', 'group', 'shortcode', 'template', 'user_id', 'category_id'
  ];

  public function category()
  {
    return $this->hasOne('App\Category','id','category_id');
  }

  public function variable(){
    return $this->hasMany('App\Variable');
  }
}
