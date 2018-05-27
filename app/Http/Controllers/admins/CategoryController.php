<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{
	public function index(){
		$cates=Category::getAll();
		return view('admins.categories.index',compact('cates'));
	}

	public function store(Request $request){
		$request->slug=str_slug($request->name);
		$result=Category::storeData($request->all());
		return redirect()->back();
	}

	public function destroy($id){
		$result=Category::del($id);
		return redirect()->back();
	}

	public function update(Request $request, $id){
		$request->slug=str_slug($request->name);
		$result=Category::updateData($id,$request->all());
		return redirect()->back();
	}
}
