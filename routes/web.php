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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category','CategoryController@index')->name('category');
Route::post('/category/store1','CategoryController@store1')->name('store1');


Route::get('/teacher','TeacherController@index')->name('teacher');
Route::post('/teacher/store2','TeacherController@store2')->name('store2');
Route::get('/show_teacher/{id}','TeacherController@show')->name('show_teacher');
Route::get('/list_teachers','TeacherController@show_list')->name('list_teachers');
Route::get('/teacher_update/{id}','TeacherController@update')->name('teacher_update');


Route::get('/class','ClassController@index')->name('class');
Route::post('/class/store3','ClassController@store3')->name('store3');
Route::get('/list_classes','ClassController@show_list')->name('list_classes');
Route::get('/show_class/{id}','ClassController@show')->name('show_class');
Route::get('/class_update/{id}','ClassController@edit')->name('class_update');
Route::post('/class_update/update','ClassController@update')->name('update');
Route::post('/destroy/{id}','ClassController@destroy');









