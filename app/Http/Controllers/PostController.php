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
        
        // Fetches posts and categories and stores them in variables
        $posts = Post::all();
        $categories = Category::all();
        
        return view('index', ['posts' => $posts, 'categories' => $categories]);
    }
    
    // Returns page for each post
    public function show(Post $post){
        
        return view('posts.show', compact('post'));
    }
    
    // Authorizes, and presents "Create new post" page
    public function create(){
        
        if (Auth::check()) {
            
            $categories = Category::all(); // Fetches the categories and stores them in variable
            
            return view('posts.create', ['categories' => $categories]);
        } else {
            return redirect('/');
        }
    }
    
    // Stores new post
    public function store(Request $data){
        $id = Auth::user()->id; // Sets users id as variable
        
        // validates input from user
        $this->validate(request(),[
            'titel'=> 'required|max:30',
            'beskrivelse'=> 'required|min:10',
            'bilde'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048'
        ]);

        // stores image at public/storage/post 
        if($data->hasFile('bilde'))
            $file = $data->file('bilde');

        // saves the filepath which is sendt to database
        $filepath = $file->store('post');
        
        // Creates new post
        Post::create([
            'title' => request('titel'),
            'body' =>  request('beskrivelse'),
            'img' => $filepath, 
            'created_at' => time(),
            'updated_at' => time(),
            'category_id' => request('category'),
            'user_id' => $id
            
            
        ]);
        
        
        return redirect('/');
        
    }
    
    // Deletes post
    public function delete(Request $id){
        $posts = Post::findOrFail($_POST['id']);
        
        // Checks if you have permission to delete post
        if(Auth::id() == $posts->user_id){
            if($posts->delete())
                return ['status' => true];
        }
        return ['status' => false];
    }
    
    // Returns myposts view and id variable
    public function personal(){
        $id = Auth::id();
        
        return view('posts.myposts', ['id' => $id ]);
        
    }
    
    // Returns all posts and their user info in JSON
    public function postAPI(){
        
        $posts = Post::with('user')->get();
        
        return response()->json($posts);
        
        
    }
    
    // Returns posts and their user info by id (never used, but stored for later convenience)
    public function postAPIid($id){
        
        $posts = Post::with('user')->where('id', $id)->get();
        
        return response()->json($posts);
        
        
    }
    
    // Returns posts and their user info whithin given category
    public function postAPIcat($catId){
        
        $posts = Post::with('user')->where('category_id', $catId)->get();
        
        return response()->json($posts);
        
        
    }
    
    // Returns posts and their user info posted by given user
    public function postAPIuser($userID){
        
        $posts = Post::with('user')->where('user_id', $userID)->get();
        
        return response()->json($posts);
        
        
    }
}