<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    
    protected $guarded = [];
    
    // Making a relation between each messages sender and users
    public function sender(){
    
        return $this->belongsTo('App\User', 'from');
    }
    
    // Making a relation between each messages reciever and users
    public function reciever(){
    
        return $this->belongsTo('App\User', 'to');
    }
    
}
