<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    // protected $table = 'teachers';
    protected $fillable = ['id','name','image','email','teacher_category','archive_teacher','introduce','created_at','update_at'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function lesson(){
        return $this->belongsTo('App\Lesson');
    }
}
