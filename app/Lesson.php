<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    // protected $table = 'classes';
    protected $fillable = ['id','class_name','class_num','category','teaher_id','archive_class','update_at','created_at'];
    
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function teachers(){
        return $this->hasMany('App\Teacher');
    }
}
