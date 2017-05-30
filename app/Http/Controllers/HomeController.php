<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        
        
        return view('home', ['recievedMessages' => $recievedMessages, 
                             'sentMessages' => $sentMessages]);

    }
    
    public function userAPI(User $id){
        
        return response()->json($id);
    }
}
