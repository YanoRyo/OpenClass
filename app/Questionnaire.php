<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    //
    protected $table = 'quetionnaires';
    
    
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
