<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    	$categories = Category::all();
    	return view('org/category',compact('categories'));
    }
    
    
    public function store1(Request $request){
    	
      
      
        $new_category = new Category;
        $categories = Category::all();
        $search_category = $request->category;
        
        $arrays_category = array();
        foreach ($categories as $category){
           array_push($arrays_category,$category->category);
        };
       
        $result = array_search($search_category, $arrays_category);
        // dd($result);
        if($search_category == $arrays_category[0]){
           
           
            $alert_category = "そのカテゴリはすでに追加されています";
            $categories = Category::all();
            return view('org/category',compact('alert_category','categories'));
            
        }elseif(!$result){
            $new_category->category = $search_category;
            $new_category->save();
            return redirect('org/category');
        }else{
            $alert_category = "そのカテゴリはすでに追加されています";
            $categories = Category::all();
            return view('org/category',compact('alert_category','categories'));
        }
        
    }
    
    public function categories_destroy(Request $request){
        
        
        $arrays = $request->category;
        foreach($arrays as $array){
            $category = Category::find($array);
            $category->delete();
        }
        
        
        return redirect('org/category');
    }
    
    public function show(){
        
        return view('org/questionnaire');
    }
    
    // protected $category = null;
    
    // // public function __construct(Category $category){
    // // 	$this->category_import = $category;
    // // }
    
    // public function import(Request $request){
    // 	// dd($request);
    // 	//全件削除
    // 	Category::truncate();
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
    // 			$category = mb_convert_encoding($row[1],'UTF-8','SJIS');
    // 			$created_at = mb_convert_encoding($row[2],'UTF-8','SJIS');
    // 			$updated_at = mb_convert_encoding($row[3],'UTF-8','SJIS');
    			
    // 			$csvimport_array = [
    //             'id' => $id, 
    //             'category' => $category, 
    //             'created_at' => $created_at, 
    //             'updated_at' => $updated_at
    //             ];
 
    //             // つくった配列の箱($array)に追加
    //             array_push($array, $csvimport_array);
     
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
    //         Category::insert($array);
     
     
    //     } else {
            
    //         //追加した配列が500以上なら、array_chunkで500ずつ分割する
    //         $array_partial = array_chunk($array, 500); //配列分割
       
    //         //分割した数を数えて
    //         $array_partial_count = count($array_partial); //配列の数
     
    //         //分割した数の分だけインポートを繰り替えす
    //         for ($i = 0; $i <= $array_partial_count - 1; $i++){
            
    //             Category::insert($array_partial[$i]);
            
    //         }
        
     
    //     }
        
    //     $categories = Category::all();
    // 	return view('V2category',compact('categories'));

    // }
}
