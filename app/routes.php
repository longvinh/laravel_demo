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

Route::get('/hello', function()
{
	return View::make('hello');
});

Route::group(array("prefix"=>"check"),function(){
   Route::post("check-username",function(){
       if(User::check_username(Input::get("username")))
           return "true";
       else return "false";
   }) ;
   Route::post("check-email",function(){
       if(User::check_email(Input::get("username")))
           return "true";
       else return "false";
   }) ;
});

Route::get('register', function()
{
	return View::make('register');
});

Route::post('register', function()
{
	$rules=array(
            "username"=>"required|min:3",
            "password"=>"required|min:6",
            "email"=>"required|email"
            );
        if(!Validator::make(Input::all(),$rules)->fails()){
            $user=new User();
            $user->username=Input::get("username");
            $user->password=Input::get("password");
            $user->email=Input::get("email");
            $user->save();
            echo "Đã đăng ký thành công";
        }
        
});

Route::get('login', function()
{
	return View::make('login');
});

Route::post('login',function(){
    if(User::check_login(Input::get("user_input"),Input::get("password")))
            echo "Đăng nhập thành công";
    else
        echo "Đăng nhập không thành công";
});