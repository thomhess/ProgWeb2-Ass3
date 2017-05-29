<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Message;

class MessageController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $recievedMessages = Message::all()->where('to', $id);
        $sentMessages = Message::all()->where('from', $id);
        
        
        return view('messages', ['recievedMessages' => $recievedMessages, 
                             'sentMessages' => $sentMessages]);

    }
    
    public function create(){
        
        if (Auth::check()) {
        
            return view('createmessage');
        } else {
            return redirect('/');
        }
    }
    
    public function store(){
        
        Post::create([
            'title' => request('title'),
            'content' =>  request('content'),
            'img' => 'imgsrc', // real imgsrc need to be put in and fixed and stuff
            'created_at' => time(),
            'updated_at' => time(),
            'category_id' => 1 // need to be fixed
            
            
        ]);
        
        
        return redirect('/');
        
    }
    
    public function messageAPIfrom($user) {
        
        $messages = Message::where('id', $user)->get();
        
        return response()->json($messages);
    }
}
