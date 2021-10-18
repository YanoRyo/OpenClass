<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    // protected $table = 'categorys';
    protected $fillable = ['id','category','created_at','update_at'];
    
 
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    

}
