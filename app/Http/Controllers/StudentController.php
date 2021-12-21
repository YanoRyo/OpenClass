<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\Teacher;
use App\Category;
use App\Questionnaire;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function questionnaire($id){
        $classes =  Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                    ->get();
        
        $classes = $classes->where('id',$id);
                    
        return view('users.questionnaire',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store4(Request $request, $id) 
    {
        //
        $questionnaire = new Questionnaire;
        
        $questionnaire->que_1 = $request->que_1;
        $questionnaire->que_2 = $request->que_2;
        $questionnaire->que_3 = $request->que_3;
        $questionnaire->que_4 = $request->que_4;
        $questionnaire->que_5 = $request->que_5;
        $questionnaire->if_text1 = $request->if_text1;
        $questionnaire->if_text2 = $request->if_text2;
        $questionnaire->better_text = $request->better_text;
        $questionnaire->comment = $request->comment;
        $questionnaire->class_id = $id;
        
        $questionnaire->save();
        
        return redirect('users/questionnaire-thanks');
        
    }
    
    public function show_thanks(){
        
       
                    
        return view('users.questionnaire-thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list_class()
    {
        //
        $categories = Category::all();
        $teacheies = Teacher::all();
        
        $classes =  Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                    ->get();
                    
        $datas = Questionnaire::all();
        
        // dd($classes);
  
        return view('users.studentsClass',compact('categories','teacheies','classes','datas'));
    }
    
    public function list_teacher()
    {
        //
        $categories = Category::all();
    	$teacheies = Teacher::all();
    	$datas = Questionnaire::all();
    	
    	return view('users.studentsTeacher',compact('categories','teacheies','datas'));
    }
    
    public function show_class($id){
        
        $classes =  Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                    ->get();
        
        $classes = $classes->where('id',$id);
        foreach($classes as $class){
            $categorys = $class->category;
            $categories = explode(",", $categorys);
        }
       
        $data = Questionnaire::all();
        
        $datas = $data->where('class_id',$id);
        // dd($datas);
        
        return view('users.studentsClass_show',compact('classes','categories','datas'));
    }
    
    public function show_teacher($id)
    {
        $show_teacher = Teacher::find($id);
        
        $categorys = $show_teacher->teacher_category;
        $teacheies_category = explode(",", $categorys);
        $teacher_id = $show_teacher->id;
        $teacher_classes= Lesson::where('teacher_id',$teacher_id)->get();
        
        
        foreach($teacher_classes as $teacher_class){
            $teacherclass_id = $teacher_class->id;
            
        }
       
        $data = Questionnaire::all();
        if(empty($teacherclass_id)){
             $class_name = "担当授業は今の所ございません";
             return view('users.studentsTeacher_show',compact('show_teacher','teacheies_category','teacher_classes','class_name'));
        }else{
            $datas = $data->where('class_id',$teacherclass_id);
            return view('users.studentsTeacher_show',compact('show_teacher','teacheies_category','teacher_classes','datas'));
        }
        
        
        // return view('users.studentsTeacher_show',compact('show_teacher','teacheies_category','teacher_classes','datas','class_name'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
