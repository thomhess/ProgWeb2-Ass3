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
    
    // Returns messages.blade.php and sends id of user as variable
    public function index()
    {
        
        // Fetches users ID and all messages
        $id = Auth::id();
        
        return view('messages', ['id' => $id]);

    }
    
    // Validates and stores messages
    public function store(Request $data){
        // Validates data
        $this->validate(request(), [
            'title' => 'required',
            'content' => 'required'
        ]);
        
        // Stores the data into a model, which stores it all into database
        Message::create([
            'title' => request('title'),
            'content' =>  request('content'),
            'from' =>  Auth::id(),
            'to' =>  request('to'),
            'created_at' => time(),
            'updated_at' => time(),
            
            
        ]);
        
        return 'suksess'; // Have to be removed
        
    }
    
    // Makes JSON-api for each message sent by user
    public function messageAPIfrom($user) {
        
        $id = Auth::user()->id; // Sets users id as variable
        
        // Checks if user have permission to access data. Returns API
        if ($user == $id) {
            
            $messages = Message::with('sender', 'reciever')->where('from', $user)->get();
        
            return response()->json($messages);
        }
        
        else {
            
            return redirect('/');
        }
    }
    
    // Makes JSON-api for each message recieved by user
    public function messageAPIto($user) {
        
        $id = Auth::user()->id; // Sets users id as variable
        
        // Checks if user have permission to access data. Returns API
        if ($user == $id) {
            
            $messages = Message::with('sender', 'reciever')->where('to', $user)->get();
        
            return response()->json($messages);
        }
        
        else {
            
            return redirect('/');
        }
    }
}
