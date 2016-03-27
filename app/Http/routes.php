<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

/**************************Binary Admin*********************************/

Route::group(['prefix' => 'admin','middleware' => 'web'], function () {
	Route::auth();
	Route::get('dashboard','contentController@allContent');
	//content
	Route::get('content/new','contentController@newContent');
	Route::get('categories', 'contentController@categories');
	Route::post('saveCategory','contentController@saveCategory');
	Route::post('saveSubcategory','contentController@saveSubcategory');
	Route::post('saveContent','contentController@saveContent');
	Route::get('allContent','contentController@allContent');
	Route::get('singleContent/{id}','contentController@singleContent');
	Route::get('contentEdit/{id}','contentController@contentEdit');
	Route::post('updateContent','contentController@updateContent');
	Route::post('updateCategory','contentController@updateCategory');
	//category wise content
	Route::get('categoryResource/{id}','contentController@categoryResource');
//Common method
	Route::get('delete/{tableName}/{id}','contentController@delete');
	Route::get('deleteBack/{tableName}/{id}','Controller@deleteBack');
	Route::get('deleteBackToId/{tableName}/{id}/{idName}','Controller@deleteBackToId');
//Contact
	Route::get('contact','contactController@contact');
	Route::post('saveContact','contactController@saveContact');
	Route::get('contactEdit/{id}','contactController@contactEdit');
	Route::post('updateContact','contactController@updateContact');
	});
Route::group(['prefix' => 'admin','middleware' => 'web'], function () {
	Route::auth();
	Route::get('addUser','userController@addUser');
	Route::get('allUsers','userController@allUsers');
	Route::get('singleUser/{id}','userController@singleUser');
	Route::get('profile','userController@profile');
	Route::post('postUser','userController@postUser');
	Route::get('changePassword/{id}','userController@changePassword');
	Route::post('updateUserPassword','userController@updateUserPassword');
	Route::get('profileEdit/{id}','userController@profileEdit');		
	Route::post('updateProfile','userController@updateProfile');
	
});
//Security 

//Route::post('customLogin','userController@authenticate');
//Route::get('register',function(){	return 'nul';});
/***************************Front Route*********************************/
Route::group(['middleware' => ['web']], function () 
{
Route::get('/','frontController@home');
Route::post('sendEmail','frontController@sendEmail');
});