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

// Route::get('/home', 'HomeController@index')->name('home');

// Route::group([ 'middleware' => 'auth'], function () {
// 	Route::get('/category','CategoryController@index')->name('category');
// 	Route::post('/category/store1','CategoryController@store1')->name('store1');
// 	Route::post('/category/destroy','CategoryController@categories_destroy');
// 	Route::get('questionnaire','CategoryController@show')->name('questionnaire');
// 	Route::get('/questionnaire','HomeController@show')->name('questionnaire');
// 	Route::post('/questionnaire/store4','HomeController@store4')->name('store4');
	
	
// 	Route::get('/searchAll','ClassController@search_allclass')->name('searchAll');

	
// });


Route::group(['prefix'=>'org','middleware'=>'auth'],function(){
	// Class
	Route::get('/class','ClassController@index')->name('org.class');
	Route::post('/store3','ClassController@store3')->name('org.store3');
	Route::get('/list_classes','ClassController@show_list')->name('org.list_classes');
	Route::get('/show_class/{id}','ClassController@show')->name('org.show_class');
	Route::get('/updateClass/{id}','ClassController@edit')->name('org.updateClass');
	Route::post('/class_update/update02/{id}','ClassController@update02')->name('org.update02');
	Route::post('/destroy1/{id}','ClassController@destroy1');
	Route::post('/archive1/{id}','ClassController@class_archive');
	Route::get('/archiveClass','ClassController@show_archive')->name('org.archiveClass');
	Route::get('/show_class_archive/{id}','ClassController@show_class_archive')->name('org.show_class_archive');
	Route::post('/archive1/cancel/{id}','ClassController@archive_cancel');
	Route::post('/import', 'ClassController@import')->name('org.class');
	Route::get('/searchClass','ClassController@search_class')->name('org.searchClass');
	// Teacher
	Route::get('/teacher','TeacherController@index')->name('org.teacher');
	Route::post('/addTeacher/store2','TeacherController@store2')->name('org.store2');
	Route::get('/show_teacher/{id}','TeacherController@show')->name('org.show_teacher');
	Route::get('/list_teachers','TeacherController@show_list')->name('org.list_teachers');
	Route::get('/updateTeacher/{id}','TeacherController@edit')->name('org.updateTeacher');
	Route::post('/update01/{id}','TeacherController@update01')->name('org.update01');
	Route::post('/destroy2/{id}','TeacherController@destroy2');
	Route::post('/archive2/{id}','TeacherController@teacher_archive');
	Route::get('/archiveTeacher','TeacherController@show_archive')->name('org.archiveTeacher');
	Route::get('/show_teacher_archive/{id}','TeacherController@show_teacher_archive')->name('org.show_teacher_archive');
	Route::post('/archive2/cancel/{id}','TeacherController@archive_cancel');
	Route::get('/searchTeacher','TeacherController@search_teacher')->name('org.searchTeacher');
	Route::get('/searchAll','ClassController@search_allclass')->name('org.searchAll');
	// Route::post('/import', 'TeacherController@import')->name('teacher');
	Route::get('/category','CategoryController@index')->name('org.category');
	Route::post('/store1','CategoryController@store1')->name('org.store1');
	Route::post('/destroy','CategoryController@categories_destroy');
});

Route::group(['prefix'=>'users','middleware'=>'auth'],function(){
	Route::get('/studentsClass','StudentController@list_class')->name('.users.studentsClass');
	Route::get('/studentsClass_show/{id}','StudentController@show_class')->name('users.studentsClass_show');
	Route::get('/studentsTeacher','StudentController@list_teacher')->name('users.studentsTeacher');
	Route::get('/studentsTeacher_show/{id}','StudentController@show_teacher')->name('users.studentsTeacher_show');
	Route::get('/questionnaire/{id}','StudentController@questionnaire')->name('users.questionnaire');
	Route::post('/store4','StudentController@store4')->name('users.store4');
	Route::get('/questionnaire-thanks','StudentController@show_thanks')->name('users.questionnaire-thanks');


});
	
	
	

	
	


