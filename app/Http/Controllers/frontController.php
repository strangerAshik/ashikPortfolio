<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class frontController extends Controller
{
	//provide the last provided contact infos

    public  function home(){
    	//contact info

    	return view('front.welcome')
    			
    	;
    }
 
  //contact email
  public function sendEmail(Request $request){
  	$name=$request->input('name');
  	$email=$request->input('email');
  	$subject=$request->input('subject');
  	$emailMessage=$request->input('message');

  	//get contact email
  	$contactEmail=DB::table('contacts')->orderBy('id','desc')->first();
  	//mail 

	$to = $contactEmail->email;
	$subject = $subject;

	$message = "
	<html>
	<head>
	<title>HTML email</title>
	</head>
	<h2>$subject</h2>
	<body>
		$emailMessage
	</body>
	</html>
	";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <contacts@techtouchss.com>' . "\r\n";
	//$headers .= 'Cc: myboss@example.com' . "\r\n";

	mail($to,$subject,$message,$headers);
	return back()->with('message','Message Send!');
  }
  
}
