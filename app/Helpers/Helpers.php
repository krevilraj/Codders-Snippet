<?php

use App\Category;
use App\Code;

function getCode($group)
{
  $data = Code::where('group', $group)->get();
  return $data;
}
function getCodeCategory($group,$category_id)
{
  $data = Code::where('group', $group)->where('category_id',$category_id)->get();
  return $data;
}

function getCategories()
{
  $data = Category::latest()->get();
  return $data;
}

function getGroup($category_id)
{
  $data = Code::select('group')->groupBy('group')->where('category_id', $category_id)->pluck('group')->toArray();
  return $data;
}


function getGrouplist($search_term)
{
  $data = Code::select('group')->groupBy('group')->where('group', 'like', $search_term)->get()->toJson();
  return $data;
}