<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Teacher;
use App\Lesson;
use Validator;
//useしないと 自動的にnamespaceのパスが付与されるのでuse
use SplFileObject;



class TeacherController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$categories = Category::all();
    	$teacheies = Teacher::all();
    	
    	$classes =  Teacher::select()->join('lessons','lessons.teacher_id','=','teachers.id')
                        ->get();
        // $classes =  Lesson::select()->join('teachers','id','=','classes.teachers_id')
                        // ->get();
        // dd($classes);
        
        // $arrays_id = array();
        // foreach($classes as $class){
        //     array_push($arrays_id,$class->teacher_id);
        //     // echo($class->teacher_id."\n");
        // }
        
        // $arrays_subject = array();
        // foreach($arrays_id as $array_id){
        //     $class = Lesson::find($array_id);
        //     array_push($arrays_subject,$class);
        //     echo($class);
        // }
    // 	$classes = Lesson::all();
    // 	$arrays_subject = array();
    // 	foreach($teacheies as $teacher){
    // 	    foreach($classes as $class){
    // 	        if($teacher->id == $class->teacher_id){
    // 	            array_push($arrays_subject,$class->class_name);
    // 	            echo($arrays_subject);
    // 	        }
    // 	    }
    // 	}
    // 	dd($classes);
    // foreach($teacheies as $teacher){
    //     foreach($arrays_id as $array_id){
           
    //         echo($array_id."\n");
    //     }
    //      echo($teacher->id."\n");
    // }
    // dd($arrays_id);
    // dd($arrays_subject);
        
        // dd($teacheies);
    
    	return view('org.teacher',compact('categories','teacheies','classes'));
    }
    
    public function store2(Request $request){
        
        $teacher = new Teacher;
        // dd($request->image);
        
        // //バリデーション（入力値チェック）
        // $validator = Validator::make($request->all() , ['name' => 'required|max:255', 'image' => 'required','email' => 'required|max:255']);

        // //バリデーションの結果がエラーの場合
        // if ($validator->fails()){
            
        //     return redirect()->back()->withErrors($validator->errors())->withInput();
        // }
        // ==========ここから追加する==========
            // $validatedData = $request->validate([
            //     'name' => 'required|max:255',
            //     'email' => 'required',
            //     'teacher_category' => 'required',
            //     'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
        // ==========ここまで追加する==========
        
        $upload_image = $request->file('image');
        
        
        if($upload_image) {
			//アップロードされた画像を保存する
			$path = $upload_image->store('public');
			//画像の保存に成功したらDBに記録する
			if($path){
				$teacher->image = $upload_image->storeAs('/storage/teacher_images', $request->name . '.jpg');
				$request->image->storeAs('public/teacher_images', $request->name . '.jpg');
			}
		}
       
  
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $array = $request->teacher_category;
        $teacher->teacher_category = implode(',', $array);
        $teacher->save();
        // $request->image->storeAs('public/teacher_images', $request->name . '.jpg');
        

        return redirect('org/teacher');

    }
    
    public function show($id){
        
        $show_teacher = Teacher::find($id);
        $categorys = $show_teacher->teacher_category;
        $teacheies_category = explode(",", $categorys);
        $teacher_id = $show_teacher->id;
        $teacher_classes= Lesson::where('teacher_id',$teacher_id)->get();
        return view('org.show_teacher',compact('show_teacher','teacheies_category','teacher_classes'));
    }
    

    
    public function edit($id){
        
        $show_teacher = Teacher::find($id);
        $categorys = $show_teacher->teacher_category;
        $teacheies_category = explode(",", $categorys);
        $teacher_id = $show_teacher->id;
        $teacher_classes= Lesson::where('teacher_id',$teacher_id)->get();
        $all_categories = Category::all();
        // dd($show_teacher->id);
        
        return view('org.updateTeacher',compact('show_teacher','teacheies_category','teacher_classes','all_categories'));
    }
    
    public function update01(Request $request,$id){
        
        
       
        // $validator = Validator::make($request->all() , ['name' => 'required|max:255', 'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048','email' => 'required|max:255']);

        // //バリデーションの結果がエラーの場合
        // if ($validator->fails()){
            
        //     return redirect()->back()->withErrors($validator->errors())->withInput();
        // }
        $teacher = Teacher::find($request->id);
        // // ==========ここから追加する==========
        //     $validatedData = $request->validate([
        //         'name' => 'required|max:255',
        //         'email' => 'required',
        //         'teacher_category' => 'required',
        //         // 'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
        // // ==========ここまで追加する==========
        
        $upload_image = $request->file('image');
        
        if($upload_image) {
			//アップロードされた画像を保存する
			$path = $upload_image->store('public');
			//画像の保存に成功したらDBに記録する
			if($path){
				$teacher->image = $upload_image->storeAs('/storage/teacher_images', $request->name . '.jpg');
				$request->image->storeAs('public/teacher_images', $request->name . '.jpg');
			}
		}
       
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $array = $request->teacher_category;
        $teacher->teacher_category = implode(',', $array);
        $teacher->save();
        // $request->image->storeAs('public/teacher_images', $request->name . '.jpg');
        
        
        
        return redirect('org/teacher');
        
    }
    
    public function destroy2(Request $request){
        
        
        $teacher = Teacher::find($request->id);
        $teacher->delete();
        
        return redirect('org/teacher');
    }
    
    public function show_list(){
        
        $teachers = Teacher::all();
    
        return view('org.list_teachers',compact('teachers'));
    }
    
    public function teacher_archive(Request $request)
    {
        
        $teacher = Teacher::find($request->id);
        
        $archive_num = "1";
        $teacher->archive_teacher = $archive_num;
        
        $teacher->save();
        
        return redirect('org/teacher');
    }
    
    
    public function show_archive()
    {
        
        $teachers = Teacher::all();
        
        return view('org.archiveTeacher',compact('teachers'));
    }
    
    
    public function show_teacher_archive($id)
    {
        $show_teacher = Teacher::find($id);
        $categorys = $show_teacher->teacher_category;
        $teacheies_category = explode(",", $categorys);
        $teacher_id = $show_teacher->id;
        $teacher_classes= Lesson::where('teacher_id',$teacher_id)->get();
        return view('org.show_teacher_archive',compact('show_teacher','teacheies_category','teacher_classes'));
        
    }
    
    public function archive_cancel(Request $request)
    {
        
        $teacher = Teacher::find($request->id);
        
        $archive_flag = $teacher->archive_teacher;
        
        if ($archive_flag != null){
            $teacher->archive_teacher = null;
            $teacher->save();
        }
        return redirect('org/archiveTeacher');
    }
    
    public function search_teacher(Request $request)
    {
        // ==========ここから追加する==========
            $validatedData = $request->validate([
                'search' => 'required|max:255',
                
            ]);
        // ==========ここまで追加する==========
        $search = $request->input('search');
        
        $all_teachers = Teacher::query();
        // もしキーワードがあったら
        if($search !== null){
            
            $teachers = $all_teachers->where('name','like','%'.$search.'%')->get();
           
        };
   
        return view('org.searchTeacher',compact('teachers'));
    }
    
    protected $teacher = null;
    
    // public function __construct(Category $category){
    // 	$this->category_import = $category;
    // }
    
    // public function import(Request $request){
    // 	// dd($request);
    // 	//全件削除
    // 	Teacher::truncate();
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
    // 	$array = [];
    	
    // 	$row_count = 1;
    	
    // 	//取得したオブジェクトを読み込み
    // 	foreach($file as $row){
    // 		// 最終行の処理(最終行が空っぽの場合の対策
    // 		if($row === [null]) continue;
    		
    // 		// 1行目のヘッダーは取り込まない
    // 		if($row_count > 1){
    // 			// CSVの文字コードがSJISなのでUTF-8に変更
    // 			$id = mb_convert_encoding($row[0],'UTF-8','SJIS');
    // 			$name = mb_convert_encoding($row[1],'UTF-8','SJIS');
    // 			$image = mb_convert_encoding($row[2],'UTF-8','SJIS');
    // 			$email = mb_convert_encoding($row[3],'UTF-8','SJIS');
    // 			$teacher_category = mb_convert_encoding($row[4],'UTF-8','SJIS');
    // 			$archive_teacher = mb_convert_encoding($row[5],'UTF-8','SJIS');
    // 			$introduce = mb_convert_encoding($row[6],'UTF-8','SJIS');
    // 			$updated_at = mb_convert_encoding($row[7],'UTF-8','SJIS');
    // 			$created_at = mb_convert_encoding($row[8],'UTF-8','SJIS');
    			
    // 			$csvimport_array = [
    //             'id' => $id, 
    //             'name' => $name, 
    //             'image' => $image,
    //             'email' => $email,
    //             'teacher_category' => $teacher_category,
    //             'archive_teacher' => $archive_teacher,
    //             'introduce' => $introduce,
    //             'updated_at' => $updated_at,
    //             'created_at' => $created_at
                
    //             ];
 
    //             // つくった配列の箱($array)に追加
    //             // array_push($array, $csvimport_array);
     
    //                 // 数が多いと処理重すぎなのでバルクインサートに切り替える
    //                 // CSVimport::insert(array(
    //                 //     'name' => $name, 
    //                 //     'reserved_date' => $reserved_date, 
    //                 //     'checkin_date' => $checkin_date, 
    //                 //     'total_price' => $total_price
    //                 // ));
    // 		}
    // 		$row_count++;
    // 	}
    	
    // 	//追加した配列の数を数える
    //     $array_count = count($array);
    // 	//追加した配列の数を数える
    //     $array_count = count($array);
     
    //     //もし配列の数が500未満なら
    //     if ($array_count < 500){
     
    //         //配列をまるっとインポート(バルクインサート)
    //         Teacher::insert($array);
     
     
    //     } else {
            
    //         //追加した配列が500以上なら、array_chunkで500ずつ分割する
    //         $array_partial = array_chunk($array, 500); //配列分割
       
    //         //分割した数を数えて
    //         $array_partial_count = count($array_partial); //配列の数
     
    //         //分割した数の分だけインポートを繰り替えす
    //         for ($i = 0; $i <= $array_partial_count - 1; $i++){
            
    //             Teacher::insert($array_partial[$i]);
            
    //         }
        
     
    //     }
        
    //     return redirect('V2class');

    // }
}
