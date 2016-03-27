<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class contactController extends Controller
{
    public function  contact(){
    	$contact=DB::table('contacts')->orderBy('id','desc')->first();
    	return view('admin.content.contact',compact('contact'));
    }
    public function  contactEdit($id){
    	$contact=DB::table('contacts')->where('id',$id)->first();
    	return view('admin.content.editContact',compact('contact'));
    }
    public function saveContact(Request $request){
    	DB::table('contacts')->insert(
    		array(
    				'email'=>$request->input('email'),
    				'phone'=>$request->input('phone'),
    				'moblie'=>$request->input('mobile'),
    				'fax'=>$request->input('fax'),
    				'mailling_address'=>$request->input('mailling_address'),
    				'gps_latitude'=>$request->input('gps_latitude'),
    				'gps_longitude'=>$request->input('gps_longitude'),

    				'creator'=>'Ashik',
		            'updater'=>'Ashik',
		            'created_at'=>date('Y-m-d H:i:s'),
		            'updated_at'=>date('Y-m-d H:i:s')
    			)
    		);
    	return back()->with('message','New Contact Saved');
    }
    public function updateContact(Request $request){
    	 $id=$request->input('id');
    	 DB::table('contacts')
    	->where('id',$id)
    	->update(array(
    				'email'=>$request->input('email'),
    				'phone'=>$request->input('phone'),
    				'moblie'=>$request->input('mobile'),
    				'fax'=>$request->input('fax'),
    				'mailling_address'=>$request->input('mailling_address'),
    				'gps_latitude'=>$request->input('gps_latitude'),
    				'gps_longitude'=>$request->input('gps_longitude'),

		            'updater'=>'Ashik',
		            'updated_at'=>date('Y-m-d H:i:s')
    			));
    	return redirect('admin/contact')->with('message','Contact Updated');
    }
}
