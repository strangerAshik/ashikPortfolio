<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use DB;
use App\User;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Requests;
use App\Http\Controllers\Controller;

class userController extends Controller
{
  
    public  function addUser(){
    	return view('admin.user.addUser');
    }
 
    public  function allUsers(){
    	$allUsers=User::all();
    	return view('admin.user.allUsers',['users'=>$allUsers]);
    }
    public function singleUser($id){
    	
    	$profile=User::find($id);
    	return view('admin.user.singleUser',['profile'=>$profile]);
    }
    public function profile(){
    	$id=Auth::user()->id;
    	$profile=User::find($id);
    	return view('admin.user.singleUser',['profile'=>$profile]);
    }
    public function authenticate(Request $request)
    {
    	$email=$request->input('email');
    	$password=$request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect('admin/dashboard');
        }
        return 'failed Attempt ';
    }
    public function postUser(Request $request){
    	$rule=[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ];
        $validator = Validator::make($request->all(),$rule);
         if ($validator->fails()) {
         	return back()->with('message','Wrong Attempt');
        }
        else{
        	DB::table('users')->insert(array(
        			'name'=>$request->input('name'),
        			'email'=>$request->input('email'),
        			'password'=>bcrypt($request->input('password')),        			
        			'created_at'=>date('Y-m-d H:i:s'),        			
        			'updated_at'=>date('Y-m-d H:i:s'),        			
        		));
        	return redirect('admin/allUsers');
    	}
  }

  public function changePassword($id){
  	return view('auth.changePassword',['id'=>$id]);
  }
  public function updateUserPassword(Request $request){  
  	$id=$request->input('id');
  	$old=$request->input('old_password');
  	$new=$request->input('password');
  	$conf=$request->input('password_confirmation');

	if (Hash::check($old, Auth::user()->password) && $new==$conf) {
	    DB::table('users')->where('id',$id)->update(array(
  			'password'=>bcrypt($new),
  			'updated_at'=>date('Y-m-d H:i:s'),
  		));
  		return redirect('logout');
	  }
	 else return back()->with('message','Wrong Attempt!!');

  	



  }
  public function profileEdit($id){
  	$infos=DB::table('users')->where('id',$id)->first();
  	return view('admin.user.editUser',['infos'=>$infos]);
  }
  public function updateProfile(Request $request){
	$id=$request->input('id');
  	DB::table('users')->where('id',$id)->update(array(
  			'name'=>$request->input('name'),
  			'email'=>$request->input('email'),
  			'updated_at'=>date('Y-m-d H:i:s')
  		));
  	return back()->with('message','Profile Information Updated!');
  }

  
}
