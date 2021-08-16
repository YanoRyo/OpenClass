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
    	$categories = Category::all();
    	$teacheies = Teacher::all();
    	
    	return view('V2teacher',compact('categories','teacheies'));
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
        

        return redirect('V2teacher');

    }
    
    public function show($id){
        
        $show_teacher = Teacher::find($id);
        $categorys = $show_teacher->teacher_category;
        $teacheies_category = explode(",", $categorys);
        $teacher_id = $show_teacher->id;
        $teacher_classes= Lesson::where('teacher_id',$teacher_id)->get();
        return view('show_teacher',compact('show_teacher','teacheies_category','teacher_classes'));
    }
    

    
    public function edit($id){
        
        $show_teacher = Teacher::find($id);
        $categorys = $show_teacher->teacher_category;
        $teacheies_category = explode(",", $categorys);
        $teacher_id = $show_teacher->id;
        $teacher_classes= Lesson::where('teacher_id',$teacher_id)->get();
        $all_categories = Category::all();
        
        return view('V2updateTeacher',compact('show_teacher','teacheies_category','teacher_classes','all_categories'));
    }
    
    public function update01(Request $request,$id){
        
        
       
        $validator = Validator::make($request->all() , ['name' => 'required|max:255', 'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048','email' => 'required|max:255']);

        //バリデーションの結果がエラーの場合
        if ($validator->fails()){
            
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $teacher = Teacher::find($request->id);
        
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
        $array = $request->category;
        $teacher->teacher_category = implode(',', $array);
        $teacher->save();
        $request->image->storeAs('public/teacher_images', $request->name . '.jpg');
        
        
        
        return redirect('V2teacher');
        
    }
    
    public function destroy(Request $request){
        
        
        $teacher = Teacher::find($request->id);
        $teacher->delete();
        
        return redirect('V2teacher');
    }
    
    public function show_list(){
        
        $teachers = Teacher::all();
    
        return view('list_teachers',compact('teachers'));
    }
    
    public function teacher_archive(Request $request)
    {
        
        $teacher = Teacher::find($request->id);
        
        $archive_num = "1";
        $teacher->archive_teacher = $archive_num;
        
        $teacher->save();
        
        return redirect('V2teacher');
    }
    
    
    public function show_archive()
    {
        
        $teachers = Teacher::all();
        
        return view('V2archiveTeacher',compact('teachers'));
    }
    
    
    public function show_teacher_archive($id)
    {
        $show_teacher = Teacher::find($id);
        $categorys = $show_teacher->teacher_category;
        $teacheies_category = explode(",", $categorys);
        $teacher_id = $show_teacher->id;
        $teacher_classes= Lesson::where('teacher_id',$teacher_id)->get();
        return view('show_teacher_archive',compact('show_teacher','teacheies_category','teacher_classes'));
        
    }
    
    public function archive_cancel(Request $request)
    {
        
        $teacher = Teacher::find($request->id);
        
        $archive_flag = $teacher->archive_teacher;
        
        if ($archive_flag != null){
            $teacher->archive_teacher = null;
            $teacher->save();
        }
        return redirect('V2archiveTeacher');
    }
}
