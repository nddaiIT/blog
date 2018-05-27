<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="posts";
    protected $fillable = array('title','content','description','slug','image','category_id','user_id','count_view');

    public static function getAll(){
    	return Post::get();
    }

    public static function del($id){
    	return Post::find($id)->delete();
    }

    public static function storeData($data){
    	return Post::create($data);
    }

    public static function updateData($id,$data){
    	return Post::find($id)->update($data);
    } 
}
