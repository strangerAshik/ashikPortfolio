<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function deleteBack($tableName,$id){
    	$delete=DB::table($tableName)->where('id',$id)->delete();
    	return back()->with('message','Successfully Deleted');
    }
    public function deleteBackToId($tableName,$id,$idName){
    	//return 'hello';
    	$delete=DB::table($tableName)->where('id',$id)->delete();
    	return back('#img')->with('message','Successfully Deleted');
    }
}
