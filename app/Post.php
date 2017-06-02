<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = []; // Guarding nothing for convenience

    public function image(){
    	// Something like this
    	return $this->haveOne('image')->get();
    }
    
    // Setting relation between each post and user
    public function user(){
    
        return $this->belongsTo('App\User', 'user_id');
    }

}
