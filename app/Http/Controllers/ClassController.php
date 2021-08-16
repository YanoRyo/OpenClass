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
        $teacheies = Teacher::all();
        
        $classes =  Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')
                    ->get();
                    
        
        // $classes = $classes->where('id',$id);
        // foreach($classes as $class){
        //     $class_id = $class->id;
        //     $classes = $class->where('id',$class_id);
        //     dd($class_id);
        //     $categorys = $classes->category;
        //     $categories = explode(",", $categorys);
        // }
        // dd($categories);
        
        return view('V2class',compact('categories','teacheies','classes'));
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
        // dd($request);
        $class = new Lesson;
        $class->class_name = $request->class_name;
        $class->class_num = $request->class_num;
        $array = $request->category;
        $class->category = implode(',', $array);
        $class->teacher_id = $request->teacher_id;
        $class->save();
        
        return redirect('V2class');
        
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
        
        $classes = $classes->where('id',$id);
        foreach($classes as $class){
            $categorys = $class->category;
            $categories = explode(",", $categorys);
        }
       
        
        
        return view('show_class',compact('classes','categories'));
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
        
        $classes = $classes->where('id',$id);
        foreach($classes as $class){
            $categorys = $class->category;
            $categories = explode(",", $categorys);
        }
      
        $all_categories = Category::all();
        $all_teacheies = Teacher::all();
        
        return view('V2updateClass',compact('classes','categories','all_categories','all_teacheies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update02(Request $request, $id)
    {
        //
        // dd($request);
        $class = Lesson::find($id);
        $class->class_name = $request->class_name;
        $class->class_num = $request->class_num;
        $array = $request->category;
        $class->category = implode( ',', $array);
        $class->teacher_id = $request->teacher_id;
        $class->save();
        return redirect('V2class');
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
        
        return redirect('V2class');
    }
    
    public function show_list()
    {
        $classes =  Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')
                    ->get();
        
        
        
        return view('list_classes',compact('classes'));
    }
    
    public function class_archive(Request $request)
    {
        
      
        
        $class = Lesson::find($request->id);
        
        // dd($class);
        $archive_num = "1";
        $class->archive_class = $archive_num;
        $class->save();
        
        return redirect('V2class');
    }
    
    public function show_archive()
    {
        
        $classes =  Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')
                    ->get();
        
        return view('V2archiveClass',compact('classes'));
    }
    
    public function show_class_archive($id)
    {
        $classes =  Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')
                    ->get();
        
        $classes = $classes->where('id',$id);
        foreach($classes as $class){
            $categorys = $class->category;
            $categories = explode(",", $categorys);
        }
       
        
        
        return view('show_class_archive',compact('classes','categories'));
        
    }
    
    
    public function archive_cancel(Request $request)
    {
        
        $class = Lesson::find($request->id);
        
        $archive_flag = $class->archive_class;
        
        if ($archive_flag != null){
            $class->archive_class = null;
            $class->save();
        }
        
        // dd($class);
        
        return redirect('V2archiveClass');
        
    }
}
