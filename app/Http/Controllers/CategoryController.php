<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	
    //
    public function index(){
    	$categories = Category::all();
    	return view('V2category',compact('categories'));
    }
    
    
    public function store1(Request $request){
    	
        
        $category = new Category;
        $category->category = $request->category;
        $category->save();
        $last_insert_id = $category->id;


        return redirect('V2category');
    }
    
}
