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
    	$welcome=DB::table('contents')->where('unique_key','welcome')->orderBy('id','desc')->first();
    	$profSkill=DB::table('contents')->where('unique_key','professional_capabilitie')->orderBy('id','desc')->first();
    	$tecSkill=DB::table('contents')->where('unique_key','technical_skills')->orderBy('id','desc')->first();
    	$works=DB::table('contents')->where('category_id','4')->get();
    	return view('front.welcome')
    			->with('welcome',$welcome)
    			->with('profSkill',$profSkill)
    			->with('tecSkill',$tecSkill)   			
    			->with('works',$works)   			
    			;
    }

    public function blog(){
      $posts=DB::table('contents')
          ->leftJoin('documents','documents.mother_id','=','contents.id')
          ->orderBy('contents.id','desc')
          ->select('contents.*','documents.calling_id')
          ->where('contents.category_id','5')
          ->paginate(10);
      return view('front.blog',['posts'=>$posts]);
    }
    public function search(Request $request){
       $key=$request->input('search');
      $posts=DB::table('contents')
          ->leftJoin('documents','documents.mother_id','=','contents.id')
          ->orderBy('contents.id','desc')
          ->select('contents.*','documents.calling_id')
          ->where(function ($query) {$query->where('contents.category_id','5');})
          ->where(function ($query) use ($key) { 
                  $query->where('contents.title','LIKE','%'.$key.'%')
                        ->orWhere('contents.content','LIKE','%'.$key.'%')
                        ->orWhere('contents.unique_key','LIKE','%'.$key.'%');
              })
           
          // ->where('contents.category_id','5')
          // ->Where('contents.title','LIKE','%'.$key.'%')
          // ->orWhere('contents.content','LIKE','%'.$key.'%')
          ->paginate(10);
      return view('front.blog',['posts'=>$posts]);
    }
    public function category($cat){
      
      $posts=DB::table('contents')
          ->leftJoin('documents','documents.mother_id','=','contents.id')
          ->orderBy('contents.id','desc')
          ->select('contents.*','documents.calling_id')
          ->where('contents.category_id','5')
          ->Where('contents.unique_key','LIKE','%'.$cat.'%')
          ->paginate(10);
      return view('front.blog',['posts'=>$posts]);
    }
    public function single($id){
      $post=DB::table('contents')
          ->leftJoin('documents','documents.mother_id','=','contents.id')          
          ->select('contents.*','documents.calling_id')
          ->where('contents.id',$id)
          ->first();
    	return view('front.single',['post'=>$post]);
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
  	if($contactEmail)
	$to = $contactEmail->email;
	else
	$to = 'md.ashikuzzaman.ashik@gmail.com';
	
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
	return redirect('/#contact')->with('message','Message Send!');
  }
  
}
