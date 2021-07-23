<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher_Category extends Model
{
    //
    protected $table = 'teachers_category';
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    
    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
}
