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

}
