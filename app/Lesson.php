<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $table = 'classes';
    
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function teachers(){
        return $this->hasMany('App\Teacher');
    }
}
