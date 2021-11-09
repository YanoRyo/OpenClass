<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('org.class');
    }
    
    public function show(){
        
        return view('V2questionnaire');
    }
    
    public function store4(Request $request)
    {
       
        $questionnaire = new Questionnaire;
        
        $questionnaire->que_1 = $request->que_1;
        $questionnaire->que_2 = $request->que_2;
        $questionnaire->que_3 = $request->que_3;
        $questionnaire->que_4 = $request->que_4;
        $questionnaire->que_5 = $request->que_5;
        $questionnaire->comment = $request->comment;
        $questionnaire->save();
        
        return redirect('V2questionnaire');
    }
}
