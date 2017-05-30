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
                             'sentMessages' => $sentMessages, 'id' => $id]);

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
            'created_at' => time(),
            'updated_at' => time(),
            
            
        ]);
        
        
        return redirect('/');
        
    }
    
    public function messageAPIfrom($user) {
        
        $id = Auth::user()->id;
        
        if ($user == $id) {
            
            $messages = Message::with('sender', 'reciever')->where('from', $user)->get();
        
            return response()->json($messages);
        }
        
        else {
            
            return redirect('/');
        }
    }
    
    public function messageAPIto($user) {
        
        $id = Auth::user()->id;
        
        if ($user == $id) {
            
            $messages = Message::with('sender', 'reciever')->where('to', $user)->get();
        
            return response()->json($messages);
        }
        
        else {
            
            return redirect('/');
        }
    }
}
