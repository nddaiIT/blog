<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="Categories";
    protected $fillable = array('name','slug','parent_id');

    public static function getAll(){
    	return Category::get();
    }

    public static function del($id){
    	return Category::find($id)->delete();
    }

    public static function storeData($data){
    	return Category::create($data);
    }

    public static function updateData($id,$data){
    	return Category::find($id)->update($data);
    } 

}
