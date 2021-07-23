<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Lesson;
use App\Teacher;
use App\Category;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        $teachers = Teacher::all();
        // dd($teachers);
        return view('class',compact('categories','teachers'));
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
    public function store3(Request $request)
    {
        //
        $class = new Lesson;
        $class->class_name = $request->class_name;
        $class->class_num = $request->class_num;
        $array = $request->category;
        $class->category = implode( ',', $array);
        $class->teacher_id = $request->teacher_id;
        $class->save();
        
        return redirect('class');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        $classes =  Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')
                    ->get();
        
        $class = $classes->where('id',$id);
        // dd($class);
        
        foreach($classes as $class){
            $categorys = $class->category;
            $categories = explode(",", $categorys);
           
        }
        dd($class);
        
        
        return view('show_class',compact('class','categories'));
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
        $classes =  Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')
                    ->get();
        
        $class = $classes->where('id',$id);
        foreach($classes as $class){
            $categorys = $class->category;
            $categories = explode(",", $categorys);
        }
        
        $all_categories = Category::all();
        $all_teacheies = Teacher::all();
        
        return view('class_update',compact('class','categories','all_categories','all_teacheies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $class = Lesson::find($request->id);
        $class->class_name = $request->class_name;
        $class->class_num = $request->class_num;
        $array = $request->category;
        $class->category = implode( ',', $array);
        $class->teacher_id = $request->teacher_id;
        $class->save();
        return view('class_update',compact('class','categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        // dd($request->id);
        $class = Lesson::find($request->id);
        $class->delete();
        
        return redirect('list_classes');
    }
    
    public function show_list()
    {
        $classes =  Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')
                    ->get();
        
        
        
        return view('list_classes',compact('classes'));
    }
}
