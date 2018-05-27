<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\User;
class PostController extends Controller
{
    public function index(){
    	$posts=Post::getAll();
    	$cates=Category::getAll();
    	$users=User::getAll();
    	return view('admins.posts.index',[
    		"posts" => $posts,
    		"cates" => $cates, 
    		"users" => $users,
    	]);
    }

    public function update(Request $request,$id){
        $request->slug=str_slug($request->title)."-".$request->id;
        $result=Post::updateData($id,$request->all());
        return redirect()->back();
    }

    public function store(Request $request){
        $request->slug=str_slug($request->title)."-".$request->id;
        $result=Post::storeData($request->all());
        return redirect()->back();
    }

    public function destroy($id){
        $result=Post::del($id);
        return redirect()->back();
    }
}
