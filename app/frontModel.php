<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class frontModel extends Model
{
    static function blogPostSubCategories(){
    	return DB::table('contents')
    	->where('contents.category_id','5')
    	->distinct()->lists('unique_key');
    }
}
