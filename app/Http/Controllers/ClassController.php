<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Lesson;
use App\Teacher;
use App\Category;
use App\Questionnaire;
//useしないと 自動的にnamespaceのパスが付与されるのでuse
use SplFileObject;


class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
     
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $categories = Category::all();
        $teacheies = Teacher::all();
        
        $classes =  Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                    ->get();
       
        // dd($classes);
        // $classes = $classes->where('id',$id);
        // foreach($classes as $class){
        //     $class_id = $class->id;
        //     $classes = $class->where('id',$class_id);
        //     dd($class_id);
        //     $categorys = $classes->category;
        //     $categories = explode(",", $categorys);
        // }
        // dd($categories);
        $datas = Questionnaire::all();
        // $datas = Lesson::select()->join('quetionnaires','quetionnaires.class_id','=','lessons.id')->get();
        // $datas = Questionnaire::select()->join('lessons','lessons.id','=','questionnaires.class_id');
        // $datas =  Teacher::select()->join('questionnaires','questionnaires.class_id','=','teachers.id')
        //             ->get();quetionnaires
        // dd($datas);
        
        // $arrays_data01 = array();
        // $arrays_data02 = array();
        // $arrays_data03 = array();
        // $arrays_data04 = array();
        // $arrays_data05 = array();
        // foreach($datas as $data){
        //     // print($data->que_2);
        //     // foreach($classes as $class){
        //     //     if($data->class_id == $class->id){
        //     //         array_push($arrays_data01,$data->que_1);
        //     //         dd($arrays_data01);
        //     //     }
        //     // }
        //     // // print($data);
            
        //     // array_push($arrays_data02,$data->que_2);
        //     // array_push($arrays_data03,$data->que_3);
        //     // array_push($arrays_data04,$data->que_4);
        //     // array_push($arrays_data05,$data->que_5);
        //     // dd($arrays_data);
            
        //     // dd($total01);
        // }
        
        // // dd($arrays_data04);
        //     $count01 = count($arrays_data01,COUNT_RECURSIVE);
        //     $count02 = count($arrays_data02,COUNT_RECURSIVE);
        //     $count03 = count($arrays_data03,COUNT_RECURSIVE);
        //     $count04 = count($arrays_data04,COUNT_RECURSIVE);
        //     $count05 = count($arrays_data05,COUNT_RECURSIVE);
        //     $sum01 = array_sum($arrays_data01);
        //     $sum02 = array_sum($arrays_data02);
        //     $sum03 = array_sum($arrays_data03);
        //     $sum04 = array_sum($arrays_data04);
        //     $sum05 = array_sum($arrays_data05);
            
        //     $total01 = $sum01/$count01;
        //     $total02 = $sum02/$count02;
        //     $total03 = $sum03/$count03;
        //     $total04 = $sum04/$count04;
        //     $total05 = $sum05/$count05;
            
        //     $value = round(($total01+$total02+$total03+$total04+$total05)/5,1);
        // dd($total01);
        // $arrays_data = array();
        // foreach($datas as $data){
        //     array_push($arrays_data,$data->que_1);
            
        // }
        // dd($arrays_data);
        
        return view('org.class',compact('categories','teacheies','classes','datas'));
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
        // dd($request->teacher_id);
        $class = new Lesson;
        $teachers = Teacher::all();
        
        $arrays_teacher = array();
        foreach($teachers as $teacher){
            array_push($arrays_teacher,$teacher->id);
        }
        // dd($arrays_teacher);
        $search_string = $request->teacher_id;
        
        if(in_array($search_string,$arrays_teacher)){
            $class->teacher_id = $search_string;
        }elseif(is_string($search_string)){
            return redirect('org/class');
        }
        
        // // ==========ここから追加する==========
        //     $validatedData = $request->validate([
        //         'class_name' => 'required|max:255',
        //         'class_num' => 'required',
        //         'category' => 'required',
        //         'teacher_id' => 'required',
        //         // 'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
        // // ==========ここまで追加する==========
        $class->class_name = $request->class_name;
        $class->class_num = $request->class_num;
        $array = $request->teacher_category;
        $class->category = implode(',', $array);
        // $class->teacher_id = $request->teacher_id;
        $class->save();
        
        return redirect('org/class');
        
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
        
        $classes =  Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                    ->get();
        
        $classes = $classes->where('id',$id);
        foreach($classes as $class){
            $categorys = $class->category;
            $categories = explode(",", $categorys);
        }
       
        
        
        return view('org.show_class',compact('classes','categories'));
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
        
        
        $classes =  Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                    ->get();
        
        $classes = $classes->where('id',$id);
        // dd($classes);
        // dd($classes);
        foreach($classes as $class){
            $categorys = $class->category;
            $categories = explode(",", $categorys);
        }
      
        $all_categories = Category::all();
        $all_teacheies = Teacher::all();
        
        return view('org.updateClass',compact('classes','categories','all_categories','all_teacheies'));
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
        // // ==========ここから追加する==========
        //     $validatedData = $request->validate([
        //         'class_name' => 'required|max:255',
        //         'class_num' => 'required',
        //         'category' => 'required',
        //         'teacher_id' => 'required',
        //         // 'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
        // ==========ここまで追加する==========
        $class->class_name = $request->class_name;
        $class->class_num = $request->class_num;
        $array = $request->teacher_category;
        $class->category = implode( ',', $array);
        $class->teacher_id = $request->teacher_id;
        $class->save();
        return redirect('org/class');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy1(Request $request)
    {
        //
        // dd($request->id);
        $class = Lesson::find($request->id);
        $class->delete();
        
        return redirect('org/class');
    }
    
    public function show_list()
    {
        $classes =  Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                    ->get();
        
        
        
        return view('org.list_classes',compact('classes'));
    }
    
    public function class_archive(Request $request)
    {
        
      
        
        $class = Lesson::find($request->id);
        
        // dd($class);
        $archive_num = "1";
        $class->archive_class = $archive_num;
        $class->save();
        
        return redirect('org/class');
    }
    
    public function show_archive()
    {
        
        $classes =  Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                    ->get();
        
        return view('org.archiveClass',compact('classes'));
    }
    
    public function show_class_archive($id)
    {
        $classes =  Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                    ->get();
        
        $classes = $classes->where('id',$id);
        foreach($classes as $class){
            $categorys = $class->category;
            $categories = explode(",", $categorys);
        }
       
        
        
        return view('org.show_class_archive',compact('classes','categories'));
        
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
        
        return redirect('org/archiveClass');
        
    }
    
    public function search_class(Request $request)
    {
        // ==========ここから追加する==========
            $validatedData = $request->validate([
                'search' => 'required|max:255',
                
            ]);
        // ==========ここまで追加する==========
        $search = $request->input('search');
        
        $all_classes = Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                    ->get();
        
        // dd($all_classes);
        // もしキーワードがあったら
        if($search !== null){
            
            $classes = Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')->where('class_name','like','%'.$search.'%')
                    ->get();
            
        };
       
        return view('org.searchClass',compact('classes'));
        
    }
    public function search_allclass(Request $request)
    {
        // ==========ここから追加する==========
            $validatedData = $request->validate([
                'search' => 'required|max:255',
                
            ]);
        // ==========ここまで追加する==========
        // $search = $request->input('search');
        
        // $all_classes = Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')
        //             ->get();
        
        // // dd($all_classes);
        // // もしキーワードがあったら
        // if($search !== null){
            
        //     $classes = Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')->where('class_name','like','%'.$search.'%')
        //             ->get();
        //     $classes = Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')->where('category','like','%'.$search.'%')
        //             ->get();
                    
        //     $classes = Teacher::select()->join('classes','classes.teacher_id','=','teachers.id')->where('teachers.name','like','%'.$search.'%')
        //             ->get();
                    
        // };
        $search = $request->input('search');
        
        $all_classes = Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                    ->get();
        if($search !== null){
            
           
            $classes = Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')->where('category','like','%'.$search.'%')
                    ->get();
                    
                    
        }else{
            $classes = Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')->where('category','like','%'.$search.'%')
                    ->get();
            $classes = Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')->where('teachers.name','like','%'.$search.'%')
                    ->get();
        };
       
        return view('org.searchAll',compact('classes'));
        
    }
    
    public function pull_data(){
        
        // $datas =  Questionnaire::select()->join('lessons','lessons.teacher_id','=','questionnaires.class_id')
        //             ->get();
                    
        // dd($classes);
        
        // $datas = Questionnaire::all();
        
        // foreach($datas as $data){
            
        // }
                    
        $questionnaire01 = Questionnaire::select('que_1')->join('lessons','lessons.teacher_id','=','questionnaires.class_id')->get();
        $questionnaire02 = Questionnaire::select('que_2')->join('lessons','lessons.teacher_id','=','questionnaires.class_id')->get();
        $questionnaire03 = Questionnaire::select('que_3')->join('lessons','lessons.teacher_id','=','questionnaires.class_id')->get();
        $questionnaire04 = Questionnaire::select('que_4')->join('lessons','lessons.teacher_id','=','questionnaires.class_id')->get();
        $questionnaire05 = Questionnaire::select('que_5')->join('lessons','lessons.teacher_id','=','questionnaires.class_id')->get();
        
        $data01 = $questionnaire01->count();
        $data02 = $questionnaire02->count();
        $data03 = $questionnaire03->count();
        $data04 = $questionnaire04->count();
        $data05 = $questionnaire05->count();
        
        
        $questionnaire1 = Questionnaire::sum('que_1');
        $questionnaire2 = Questionnaire::sum('que_2');
        $questionnaire3 = Questionnaire::sum('que_3');
        $questionnaire4 = Questionnaire::sum('que_4');
        $questionnaire5 = Questionnaire::sum('que_5');
        
        $que01_num = $questionnaire1/$data01;
        $que02_num = $questionnaire2/$data02;
        $que03_num = $questionnaire3/$data03;
        $que04_num = $questionnaire4/$data04;
        $que05_num = $questionnaire5/$data05;
        
        dd($que01_num);
        
    
        
        // foreach($questionnaires as $questionnaire){
            
        //     $array[] = $questionnaire->que_1;
            
        //     $sum_num = $array->sum();
        // }
        // dd($array->sum());
        
        // $count_data = $questionnaires->que_1;
        
        // $count_datas = $count_data->count();
        
        // dd($count_datas);
    	
    	return view('org.class',compact('que01_num','que02_num','que03_num','que04_num','que05_num'));
    }
    
    // protected $lesson = null;
    
    // public function __construct(Lesson $lesson){
    // 	$this->lesson_import = $lesson;
    // }
    
    //     public function import(Request $request){
    // // 	dd($request);
    // 	//全件削除
    // 	Lesson::truncate();
    // 	// ロケールを設定(日本語に設定)
    // 	setlocale(LC_ALL, 'ja_JP.UTF-8');
    // 	// アップロードしたファイルを取得
    // 	// 'csv_file' はビューの inputタグのname属性
    // 	$uploaded_file = $request->file('csv_file');
    // 	// アップロードしたファイルの絶対パスを取得
    // 	$file_path = $request->file('csv_file')->path($uploaded_file);
    // 	//SplFileObjectを生成
    // 	$file = new SplFileObject($file_path);
    // 	//SplFileObject::READ_CSV が最速らしい
    // 	$file->setFlags(SplFileObject::READ_CSV);
    // 	//配列の箱を用意
    // // 	$array = [];
    	
    // 	$row_count = 1;
    	
    // 	//取得したオブジェクトを読み込み
    // 	foreach($file as $row){
    // 		// 最終行の処理(最終行が空っぽの場合の対策
    // 		if($row === [null]) continue;
    		
    // 		// 1行目のヘッダーは取り込まない
    // 		if($row_count > 1){
    // 			// CSVの文字コードがSJISなのでUTF-8に変更
    // 			$id = mb_convert_encoding($row[0],'UTF-8','SJIS');
    // 			$class_name = mb_convert_encoding($row[1],'UTF-8','SJIS');
    // 			$class_num = mb_convert_encoding($row[2],'UTF-8','SJIS');
    // 			$category = mb_convert_encoding($row[3],'UTF-8','SJIS');
    // 			$teacher_id = mb_convert_encoding($row[4],'UTF-8','SJIS');
    // 			$archive_class = mb_convert_encoding($row[5],'UTF-8','SJIS');
    // 			$updated_at = mb_convert_encoding($row[6],'UTF-8','SJIS');
    // 			$created_at = mb_convert_encoding($row[7],'UTF-8','SJIS');
    			
    // // 			$csvimport_array = [
    // //             'id' => $id, 
    // //             'class_name' => $class_name,
    // //             'class_num' => $class_num,
    // //             'category' => $category,
    // //             'teacher_id' => $teacher_id,
    // //             'archive_class' => $archive_class,
    // //             'updated_at' => $updated_at, 
    // //             'created_at' => $created_at
    // //             ];
 
    //             // つくった配列の箱($array)に追加
    //             // array_push($array, $csvimport_array);
     
    //                 // 数が多いと処理重すぎなのでバルクインサートに切り替える
    //                 Lesson::insert(array(
    //                     'id' => $id, 
    //                     'class_name' => $class_name,
    //                     'class_num' => $class_num,
    //                     'category' => $category,
    //                     'teacher_id' => $teacher_id,
    //                     'archive_class' => $archive_class,
    //                     'updated_at' => $updated_at, 
    //                     'created_at' => $created_at
    //                 ));
    // 		}
    // 		$row_count++;
    // 	}
    	
    // // 	//追加した配列の数を数える
    // //     $array_count = count($array);
    // // 	//追加した配列の数を数える
    // //     $array_count = count($array);
     
    // //     //もし配列の数が500未満なら
    // //     if ($array_count < 900){
     
    // //         //配列をまるっとインポート(バルクインサート)
    // //         Lesson::insert($array);
     
     
    // //     } else {
            
    // //         //追加した配列が500以上なら、array_chunkで500ずつ分割する
    // //         $array_partial = array_chunk($array, 900); //配列分割
       
    // //         //分割した数を数えて
    // //         $array_partial_count = count($array_partial); //配列の数
     
    // //         //分割した数の分だけインポートを繰り替えす
    // //         for ($i = 0; $i <= $array_partial_count - 1; $i++){
            
    // //             Lesson::insert($array_partial[$i]);
            
    // //         }
        
     
    // //     }
        
    //     return redirect('V2category');

    // }
    
    


}
