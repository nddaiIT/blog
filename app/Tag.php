<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table="tags";
    protected $fillable = array('name','slug');

    public static function getAll(){
    	return Tag::get();
    }

    public static function storeData($data){
    	return Tag::create($data);
    } 

    public static function del($id){
    	return Tag::find($id)->delete();
    } 

    public static function updateData($id,$data){
    	return Tag::find($id)->update($data);
    } 
}
