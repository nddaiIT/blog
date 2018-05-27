<?php

namespace App\Http\Controllers\blogs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;
class BlogController extends Controller
{
    public function index(){
    	$posts=Post::paginate(2);
    	$latestPosts=Post::getAll()->take(5);
    	return view('blogs.index',compact('posts','latestPosts'));
    }

    public function page(){
    	$posts=Post::getAll();
    	return view('blogs.pages.index',compact('posts'));
    }

    public function showDetail($slug){
    	$post=Post::where('slug',$slug)->first();
    	return view('blogs.pages.index',compact('post'));
    }
}
