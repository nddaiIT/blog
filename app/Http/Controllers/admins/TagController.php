<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
class TagController extends Controller
{
    public function index(){
    	$tags=Tag::getAll();
    	return view('admins.tags.index',compact('tags'));
    }

    public function store(Request $request){
        $request->slug=str_slug($request->name);
    	$result=Tag::storeData($request->all());
    	return redirect()->back();
    }

    public function update(Request $request, $id){
        $request->slug=str_slug($request->name)."-".$request->id;
    	$result=Tag::updateData($id,$request->all());
    	return redirect()->back();
    }

    public function destroy($id){
    	$result=Tag::del($id);
    	return redirect()->back();
    }
}
