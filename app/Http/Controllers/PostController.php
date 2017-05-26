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
    
    public function store(){
        
        Post::create([
            'title' => request('title'),
            'body' =>  request('body'),
            'img' => 'imgsrc', // real imgsrc need to be put in and fixed and stuff
            'created_at' => time(),
            'updated_at' => time(),
            'category_id' => 1 // need to be fixed
            
            
        ]);
        
        
        return redirect('/');
        
    }
    
    public function makeJSON(){
        
        $posts = Post::all();
        
        return response()->json($posts);
        
        
    }
    
    public function makeJSONcat($catId){
        
        $posts = Post::where('category_id', $catId)->get();
        
        return response()->json($posts);
        
        
    }
}