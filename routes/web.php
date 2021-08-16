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


Route::get('/V2category','CategoryController@index')->name('V2category');
Route::post('/V2category/store1','CategoryController@store1')->name('store1');



Route::get('/V2teacher','TeacherController@index')->name('V2teacher');
Route::post('/V2addTeacher/store2','TeacherController@store2')->name('store2');
Route::get('/show_teacher/{id}','TeacherController@show')->name('show_teacher');
Route::get('/list_teachers','TeacherController@show_list')->name('list_teachers');
Route::get('/V2updateTeacher/{id}','TeacherController@edit')->name('V2updateTeacher');
Route::post('/teacher/update01/{id}','TeacherController@update01')->name('update01');
Route::post('/teacher/destroy/{id}','TeacherController@destroy');
Route::post('/teacher/archive/{id}','TeacherController@teacher_archive');
Route::get('/V2archiveTeacher','TeacherController@show_archive')->name('V2archiveTeacher');
Route::get('/show_teacher_archive/{id}','TeacherController@show_teacher_archive')->name('show_teacher_archive');
Route::post('/teacher/archive/cancel/{id}','TeacherController@archive_cancel');


Route::get('/V2class','ClassController@index')->name('V2class');
Route::post('/class/store3','ClassController@store3')->name('store3');
Route::get('/list_classes','ClassController@show_list')->name('list_classes');
Route::get('/show_class/{id}','ClassController@show')->name('show_class');
Route::get('/V2updateClass/{id}','ClassController@edit')->name('V2updateClass');
Route::post('/class_update/update02/{id}','ClassController@update02')->name('update02');
Route::post('/class/destroy/{id}','ClassController@destroy');
Route::post('/class/archive/{id}','ClassController@class_archive');
Route::get('/V2archiveClass','ClassController@show_archive')->name('V2archiveClass');
Route::get('/show_class_archive/{id}','ClassController@show_class_archive')->name('show_class_archive');
Route::post('/class/archive/cancel/{id}','ClassController@archive_cancel');


Route::get('/V2questionnaire','HomeController@show')->name('V2questionnaire');
Route::post('/V2questionnaire/store4','HomeController@store4')->name('store4');






