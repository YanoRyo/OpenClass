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
Route::get('/teacher_update/{id}','TeacherController@edit')->name('teacher_update');
Route::post('/teacher_update/update01/{id}','TeacherController@update01')->name('update01');
Route::post('/teacher/destroy/{id}','TeacherController@destroy');
Route::post('/teacher/archive/{id}','TeacherController@teacher_archive');
Route::get('/list_teachers_archive','TeacherController@show_archive')->name('list_teachers_archive');
Route::get('/show_teacher_archive/{id}','TeacherController@show_teacher_archive')->name('show_teacher_archive');
Route::post('/teacher/archive/cancel/{id}','TeacherController@archive_cancel');


Route::get('/class','ClassController@index')->name('class');
Route::post('/class/store3','ClassController@store3')->name('store3');
Route::get('/list_classes','ClassController@show_list')->name('list_classes');
Route::get('/show_class/{id}','ClassController@show')->name('show_class');
Route::get('/class_update/{id}','ClassController@edit')->name('class_update');
Route::post('/class_update/update02/{id}','ClassController@update02')->name('update02');
Route::post('/class/destroy/{id}','ClassController@destroy');
Route::post('/class/archive/{id}','ClassController@class_archive');
Route::get('/list_classes_archive','ClassController@show_archive')->name('list_classes_archive');
Route::get('/show_class_archive/{id}','ClassController@show_class_archive')->name('show_class_archive');
Route::post('/class/archive/cancel/{id}','ClassController@archive_cancel');









