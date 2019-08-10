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
Route::group(
    [
        // 'middleware' => ['auth', 'active.admin'],
        'prefix' => 'classes',
        'as' => 'classes.'
    ],
    function () {
        Route::get('/','ClassController@index')->name('list');
        Route::get('add','ClassController@add')->name('add-form');
        Route::post('saveAdd','ClassController@saveAdd')->name('save-add');
        Route::get('edit/{class}','ClassController@editForm')->name('edit');
        Route::post('saveEdit','ClassController@saveEdit')->name('save-edit');
        Route::get('delete/{class}','ClassController@delete')->name('delete');
    }

);

Route::group(
    ['prefix' =>'admins','as'=> 'admins.'],
    function(){
        Route::get('/','AdminController@indexClass');
        Route::get('login','AdminController@login')->name('login');
        Route::post('postLogin','AdminController@postLogin')->name('postLogin');
        Route::get('logout', 'AdminController@logOut')->name('logout');
        Route::get('registry', 'AdminController@registry')->name('registry');
        Route::post('postRegistry', 'AdminController@registryPost')->name('postRegistry');
        
    }
);

Route::get('input','input@index')->name('sum-view');
Route::get('input/add','input@add');
Route::post('input/saveadd','input@saveadd')->name('sum');

Route::get('students','StudentController@index')->name('students');

Route::get('students','StudentController@index')->name('students');




// Route::get('classes','ClassController@index')->name('classes');
// Route::get('classes/add','ClassController@add')->name('classes.add-form');
// Route::post('classes/saveAdd','ClassController@saveAdd')->name('classes.save-add');

// Route::get('admin','StudentController@get_detail_id_2');

