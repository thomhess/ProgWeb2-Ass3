<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function image(){
    	// Something like this
    	return $this->haveOne('image')->get();
    }
    
    public function user(){
    
        return $this->belongsTo('App\User', 'user_id');
    }

}
