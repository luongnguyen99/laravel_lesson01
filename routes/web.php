<?php

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

// Route::view('/', 'welcome');
Route::get('/', 'HelloController@index');

// Route::get('hello','HelloController@index');
// Route::get('hello',function(){
//     return
// });
Route::get('user/{name}',function($name = null){
    return 'Đây là '. $name;
});

Route::get('input','input@index')->name('sum-view');
Route::get('input/add','input@add');
Route::post('input/saveadd','input@saveadd')->name('sum');

Route::get('students','StudentController@index')->name('students');
Route::get('classes','ClassController@index')->name('classes');

Route::get('admin','StudentController@get_detail_id_2');