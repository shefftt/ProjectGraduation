<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('home',array('before'=>'auth', function()
{
	Auth::logout();
	return View::make('home');
}));

////////////////////////////////////////////////////////////

Route::get('login', function()
{
	return View::make('main');
});

Route::post('login', function()
{
	$input = Input::all();
	$auth_array = array('email' =>$input['email'] , 'password' =>$input['password']);
	//$auth = Auth::attempt($auth_array);
	//$password =  Input::get('password');
	//$email    =  Input::get('email');
	if (Auth::attempt($auth_array)) 
	{
		return Redirect::to('home');
	}
	else
		return  Input::all();
});


/////////////////////////////////////////////////////////////////

Route::get('/{page}' ,function($page)
{
	$pages = array('privicy','terms','help','about');
	if(in_array( $page , $pages))
	
     return View::make('footer.main_f')->with('page' , $page);
 
});
