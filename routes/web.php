<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome'); // website design
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); //

Route::group([
  'prefix' => 'dashboard',
  'as' => 'dashboard.',
  'namespace' => 'backend',
  'middleware' => 'auth'
], function () {
  Route::get('/index', function () {
    return view('backend.Dashboard.index');
  });
  Route::get('/category', function () {
    return view('backend.Category.category');
  });
  Route::get('/snippet', function () {
    return view('livewire.backend.snippet.index');
  });
//  Route::get('/snippet/add', function () {
//    return view('livewire.backend.snippet.add-snippet');
//  });
//  Route::get('/snippet/add','CategoryController@category');
});
Route::group([
  'prefix' => 'dashboard',
  'as' => 'dashboard.',
  'middleware' => 'auth',
  'layout' => 'backend.layouts.app',
  'section' => 'content'
], function () {
  Route::livewire('/category', 'backend.category.category');
  Route::livewire('/store-snippet', 'backend.code.add-snippet');
  Route::livewire('/list-snippet', 'backend.code.list-snippet');
  Route::livewire('/view-snippet/{id}', 'backend.code.view-snippet');
  Route::livewire('/create-snippet/{id}', 'backend.code.create-variable');
  Route::livewire('/edit-snippet/{id}', 'backend.code.edit-snippet');
//  Route::livewire('/snippet/store', 'backend.code.add-snippet');
//  Route::get('/snippet/store', function(){
//    return view('backend.Snippet.add-snippet');
//  });
  Route::post('/show-template', 'Backend\CodeController@showtemplate');
  Route::post('/get-suggestion', 'Backend\CodeController@suggestion');
});

Route::group([
  'prefix' => 'user',
  'as' => 'user.',
  'namespace' => 'backend',
  'middleware' => 'auth',
  'layout' => 'layouts.app',
  'section' => 'content'
], function () {


  Route::get('/index', 'DashboardController@index')->name("dashboard");

  Route::livewire('/category', 'backend.category.category')->name("category");
  Route::livewire('/store-snippet', 'backend.code.add-snippet')->name("snippet.store");
  Route::livewire('/list-snippet', 'backend.code.list-snippet')->name("snippet.list");
  Route::livewire('/view-snippet/{id}', 'backend.code.view-snippet');
  Route::livewire('/create-snippet/{id}', 'backend.code.create-variable');
  Route::livewire('/edit-snippet/{id}', 'backend.code.edit-snippet');
//  Route::livewire('/snippet/store', 'backend.code.add-snippet');
//  Route::get('/snippet/store', function(){
//    return view('backend.Snippet.add-snippet');
//  });
  Route::post('/show-template', 'CodeController@showtemplate');
  Route::post('/get-suggestion', 'CodeController@suggestion');
});
Route::get('/all-address', 'HomeController@all'); 