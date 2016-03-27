<?php

namespace App\Http\Controllers;
use DB;
use App\contentModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class contentController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
	public function getCategoryObject() {
		return  DB::table('categories')->orderBy('category')->get();
		}
	public function newContent(){
		 //$categoryObject=$this->getCategoryObject();
		 $categories=contentModel::getCategoryList();
		 //$getSubcategoryList=contentModel::getSubcategoryList();
		return view('admin.content.add',compact('categories'))

		;
	}
	public function categories(){
		 $categories=contentModel::getCategoryList();
		// $subcategories=contentModel::getSubcategoryList();
		 $categoryObject=$this->getCategoryObject();
		 return view('admin.content.categories',compact('categories','categoryObject'));
	}
    public function saveCategory(Request $request ){
        DB::table('categories')->insert(array(
            'category'=>request('category'),

            'creator'=>'Ashik',
            'updater'=>'Ashik',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
            
            ));
        return back()->with('message','Category Saved');
    }
    public function updateCategory(Request $request ){
        $id=$request->input('id');

    	DB::table('categories')
        ->where('id',$id)
        ->update(array(
    		'category'=>request('category'),

    		'updater'=>'Ashik',

            'updated_at'=>date('Y-m-d H:i:s')
    		
    		));
    	return back()->with('message','Category Updated');
    }
    public function saveSubcategory(Request $request ){
    	DB::table('subcategories')->insert(array(
    		'category_id'=>request('category'),
    		'subcategory'=>request('subcategory'),

    		'creator'=>'Ashik',
    		'updater'=>'Ashik',
    		'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
    		
    		));
    	return back()->with('message','Subcategory Saved');
    }
    public function saveContent(Request $request){
        //content insert  
        $title=$request->input('title');
        $categoryId=$request->input('category_id');
        $uniqueKey=$request->input('unique_key');

        DB::table('contents')->insert(array(
                'title'=>$request->input('title'),
                'subtitle'=>$request->input('subtitle'),
                'category_id'=>$request->input('category_id'),
                'unique_key'=>$request->input('unique_key'),
                'content'=>$request->input('content'),
                'more_content'=>$request->input('more_content'),
                'hyper_link'=>$request->input('hyper_link'),

                'creator'=>'Ashik',
                'updater'=>'Ashik',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ));
        //Get the mother id of content 
         $getMotherId=DB::table('contents')
                    ->where('title',$title)
                    ->where('category_id',$categoryId)
                    ->where('unique_key',$uniqueKey)
                    ->orderBy('id','desc')
                    ->first();
                    
 //image upload 
       
    if($files = $request->hasFile('images')){
        $files = $request->file('images');
        $destinationPath = 'public/uploads';
        foreach ($files as $file) {
             $orginalName=$file->getClientOriginalName();
             $filename =$orginalName.'_'.time().'.'.$file->getClientOriginalExtension();
             $upload_success = $file->move($destinationPath, $filename);
             //insert in document table
             DB::table('documents')->insert(array(
                    'table_name'=>'contents',
                    'mother_id'=>$getMotherId->id,
                    'calling_id'=>$filename,
                    'doc_type'=>'img',
                    'doc_name'=>$orginalName,
                ));
        }
       
        }
 //pdf upload 
       
    if($files = $request->hasFile('pdfs')){
        $files = $request->file('pdfs');
        $destinationPath = 'public/uploads';
        foreach ($files as $file) {
             $orginalName=$file->getClientOriginalName();
             $filename =$orginalName.'_'.time().'.'.$file->getClientOriginalExtension();
             $upload_success = $file->move($destinationPath, $filename);
             //insert in document table
             DB::table('documents')->insert(array(
                    'table_name'=>'contents',
                    'mother_id'=>$getMotherId->id,
                    'calling_id'=>$filename,
                    'doc_type'=>'pdf',
                    'doc_name'=>$orginalName,
                ));
        }

    }
     return redirect('admin/content/new')->withInput()->with('message','Content Saved');

    }  
    public function updateContent(Request $request){
        //content insert  
        
        $id=$request->input('id');
        DB::table('contents')
                ->where('id',$id)
                ->update(array(
                'title'=>$request->input('title'),
                'subtitle'=>$request->input('subtitle'),
                'category_id'=>$request->input('category_id'),
                'unique_key'=>$request->input('unique_key'),
                'content'=>$request->input('content'),
                'more_content'=>$request->input('more_content'),
                'hyper_link'=>$request->input('hyper_link'),

                'updater'=>'Ashik',
                'updated_at'=>date('Y-m-d H:i:s')
            ));
                    
 //image upload 
       
    if($files = $request->hasFile('images')){
        $files = $request->file('images');
        $destinationPath = 'public/uploads';
        foreach ($files as $file) {
             $orginalName=$file->getClientOriginalName();
             $filename =$orginalName.'-'.time().'.'.$file->getClientOriginalExtension();
             $upload_success = $file->move($destinationPath, $filename);
             //insert in document table
             DB::table('documents')->insert(array(
                    'table_name'=>'contents',
                    'mother_id'=>$id,
                    'calling_id'=>$filename,
                    'doc_type'=>'img',
                    'doc_name'=>$orginalName,
                ));
        }
       
        }
 //pdf upload 
       
    if($files = $request->hasFile('pdfs')){
        $files = $request->file('pdfs');
        $destinationPath = 'public/uploads';
        foreach ($files as $file) {
             $orginalName=$file->getClientOriginalName();
             $filename =$orginalName.'-'.time().'.'.$file->getClientOriginalExtension();
             $upload_success = $file->move($destinationPath, $filename);
             //insert in document table
             DB::table('documents')->insert(array(
                    'table_name'=>'contents',
                    'mother_id'=>$id,
                    'calling_id'=>$filename,
                    'doc_type'=>'pdf',
                    'doc_name'=>$orginalName,
                ));
        }

    }   
      

   
        return back()->withInput()->with('message','Content Updated');
    }
public function allContent(){
    $allContent=DB::table('contents')
                //->Join('documents','contents.id','=','documents.mother_id')
                ->Join('categories','contents.category_id','=','categories.id')
                ->select('categories.category','contents.id','contents.title','contents.subtitle','contents.unique_key')
                ->get();
    $catName='';
    return view('admin.content.allContent',compact('allContent','catName'));
}
public function categoryResource($id){
    //get category name
    $catName=DB::table('categories')->where('id',$id)->first();
    $allContent=DB::table('contents')
                //->Join('documents','contents.id','=','documents.mother_id')
                ->Join('categories','contents.category_id','=','categories.id')
                ->where('contents.category_id',$id)
                ->select('categories.category','contents.id','contents.title','contents.subtitle','contents.unique_key')
                ->get();
    return view('admin.content.allContent',compact('allContent','catName'))

    ;
}
public function singleContent($id){
    $contents=DB::table('contents')            
            ->join('categories','categories.id','=','contents.category_id')
            ->where('contents.id',$id)
            ->first();
    $images=DB::table('documents')->where('mother_id',$id)->where('doc_type','img')->get();
    $pdfs=DB::table('documents')->where('mother_id',$id)->where('doc_type','pdf')->get();

    return view('admin.content.singleContent',compact('contents','images','pdfs','id'));
}
public function contentEdit($id){
      $contents=DB::table('contents')            
            ->join('categories','contents.category_id','=','categories.id')
            ->where('contents.id',$id)
            ->first();
    $images=DB::table('documents')->where('mother_id',$id)->where('doc_type','img')->get();
    $pdfs=DB::table('documents')->where('mother_id',$id)->where('doc_type','pdf')->get();
    $categories=contentModel::getCategoryList();

    return view('admin.content.edit',compact('contents','images','pdfs','categories','id'));
}
  public function delete($tableName,$id){
        $delete=DB::table($tableName)->where('id',$id)->delete();
        return redirect('admin/allContent')->with('message','Successfully Deleted');
    }

}
