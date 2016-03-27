<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
//use DB;

class contentModel extends Model
{
    static function getCategoryList(){
        return DB::table('categories')->orderBy('category')->lists('category','id');
    }
    static function getCategoryAsObject(){
    	return DB::table('categories')->orderBy('category')->get();
    }
    static function getSubcategoryList(){
    	return DB::table('subcategories')
    	->join('categories','subcategories.category_id','=','categories.id')
    	->get();
    }
    static function getSubcategoryListForDropdown(){
    	return DB::table('subcategories')->where('category_id',$id)->get();
    	
    }
    /************Front Model**********************/
    static function getFirstImage($id){
       // return $id;
        return DB::table('documents')->where('id',$id)->first();
    }
//Gallery first image
     static function getFirstImageForGallery($id){
       // return $id;
        return DB::table('documents')->where('mother_id',$id)->first();
    }

    static function documents($motherId,$tableName){
        return DB::table('documents')
                    ->where('mother_id',$motherId)
                    ->where('table_name',$tableName)
                    ->get();
    }
}
