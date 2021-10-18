<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\Teacher;
use App\Category;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
        $classes =  Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')
                    ->get();
  
        return view('V2studentsClass',compact('categories','teacheies','classes'));
    }
    
    public function list_teacher()
    {
        //
        $categories = Category::all();
    	$teacheies = Teacher::all();
    	
    	return view('V2studentsTeacher',compact('categories','teacheies'));
    }
    
    public function show_class($id){
        
        $classes =  Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')
                    ->get();
        
        $classes = $classes->where('id',$id);
        foreach($classes as $class){
            $categorys = $class->category;
            $categories = explode(",", $categorys);
        }
       
        
        
        return view('V2studentsClass_show',compact('classes','categories'));
    }
    
    public function show_teacher($id)
    {
        $show_teacher = Teacher::find($id);
        $categorys = $show_teacher->teacher_category;
        $teacheies_category = explode(",", $categorys);
        $teacher_id = $show_teacher->id;
        $teacher_classes= Lesson::where('teacher_id',$teacher_id)->get();
        return view('V2studentsTeacher_show',compact('show_teacher','teacheies_category','teacher_classes'));
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
