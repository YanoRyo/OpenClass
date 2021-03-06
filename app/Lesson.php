<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    // protected $table = 'classes';
    protected $fillable = ['id','class_name','class_num','category','teaher_id','archive_class','created_at','update_at'];
    
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function teachers(){
        return $this->hasMany('App\Teacher');
    }
    
    public function questionnaire(){
        return $this->belongsTo('App\Questionnaire');
    }
}
