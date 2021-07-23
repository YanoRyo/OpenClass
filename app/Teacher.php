<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $table = 'teachers';
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function lesson(){
        return $this->belongsTo('App\Lesson');
    }
}
