<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        
        $posts = Post::all();
        $categories = Category::all();
        
        return view('index', ['posts' => $posts, 'categories' => $categories]);
    }
    
    public function show(Post $post){
        
        
        return view('posts.show', compact('post'));
    }
    
    public function create(){
        
        if (Auth::check()) {
            
            $categories = Category::all();
        
            return view('posts.create', ['categories' => $categories]);
        } else {
            return redirect('/');
        }
        
        
    }
    
    public function store(Request $data){
        $id = Auth::user()->id;
        
        // validates input from user
        $this->validate(request(),[
            'title'=> 'required|max:30',
            'body'=> 'required|min:10',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048'

            ]);

        // stores image at public/storage/post 
        if($data->hasFile('image'))
            $file = $data->file('image');

        // saves the filepath which is sendt to database
        $filepath = $file->store('post');

        Post::create([
            'title' => request('title'),
            'body' =>  request('body'),
            'img' => $filepath, 
            'created_at' => time(),
            'updated_at' => time(),
            'category_id' => request('category'),
            'user_id' => $id
            
            
        ]);
        
        
        return redirect('/');
        
    }
    
    public function personal(){
        $id = Auth::id();
        
        return view('posts.myposts', ['id' => $id ]);
        
    }
    
    public function postAPI(){
        
        $posts = Post::with('user')->get();
        
        return response()->json($posts);
        
        
    }
    
    public function postAPIid($id){
        
        $posts = Post::with('user')->where('id', $id)->get();
        
        return response()->json($posts);
        
        
    }
    
    public function postAPIcat($catId){
        
        $posts = Post::with('user')->where('category_id', $catId)->get();
        
        return response()->json($posts);
        
        
    }
    
    public function postAPIuser($userID){
        
        $posts = Post::with('user')->where('user_id', $userID)->get();
        
        return response()->json($posts);
        
        
    }
}