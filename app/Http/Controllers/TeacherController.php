<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Teacher;
use App\Lesson;
use Validator;

class TeacherController extends Controller
{
    //
    public function index(){
    	$categorys = Category::all();
    	return view('teacher',compact('categorys'));
    }
    
    public function store2(Request $request){
        

        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all() , ['name' => 'required|max:255', 'image' => 'required','email' => 'required|max:255']);

        //バリデーションの結果がエラーの場合
        if ($validator->fails()){
            
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $teacher = new Teacher;
        
        $upload_image = $request->file('image');
        
        if($upload_image) {
			//アップロードされた画像を保存する
			$path = $upload_image->store('public');
			//画像の保存に成功したらDBに記録する
			if($path){
				$teacher->image = $upload_image->storeAs('/storage/teacher_images', $request->name . '.jpg');
			}
		}
       
  
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $array = $request->teacher_category;
        $teacher->teacher_category = implode(',', $array);
        $teacher->save();
        $request->image->storeAs('public/teacher_images', $request->name . '.jpg');
        

        return redirect('teacher');

    }
    
    public function show($id){
        
        $show_teacher = Teacher::find($id);
        $categorys = $show_teacher->teacher_category;
        $teacheies_category = explode(",", $categorys);
        $teacher_id = $show_teacher->id;
        $teacher_classes= Lesson::where('teacher_id',$teacher_id)->get();
        return view('show_teacher',compact('show_teacher','teacheies_category','teacher_classes'));
    }
    
    public function show_list(){
        
        $teachers = Teacher::all();
    
        
        return view('list_teachers',compact('teachers'));
    }
    
    public function update($id){
        
        
        
        return view('teacher_update');
        
    }
}
