<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','PagesController@getHome');

Route::get('/about','PagesController@getAbout');

Route::get('/contact','PagesController@getContact');

Route::post('/contact/submit','MessagesController@submit');

Route::middleware('throttle:500,1')->group(function(){
Route::post('/contact/submiting','MessagesController@alreadySubmit');
});

Route::post('/contact/userSubmiting','MessagesController@userAlreadySubmit');

Route::get('/messages','MessagesController@getMessages');


Route::get('del/{ck}','userAuthController@requestForDelete');




Route::get('/Login','userAuthController@checkLogin');


Route::post('/login/submit','userAuthController@login');


Route::get('/dele/sess','userAuthController@del');


Route::get('/userPost','userAuthController@getUserPosts');

Route::middleware('throttle:50,100')->group(function(){
Route::post('/contact/register','userAuthController@registerUser');
});



Route::get('/Register',function(){
  return view('Register11');
});


    ini_set('display_errors', '1');
    ini_set('error_reporting', E_ALL);



Route::get('/notify', 'PusherController@sendNotification');


Route::get('/unitTestCheck','userAuthController@testingCheck');

Route::get('/testCheck',function(){

return response()->json([
  'name'=>'Abigail'
]);
});

Route::post('/posti','userAuthController@yo');

Route::get('/deleteUser/{users}','userAuthController@deleteUser');

Route::get('/displayUsers','userAuthController@displayUsers');

Route::get('CommonPost','userAuthController@getMessages');

Route::get('/settings',function(){
  return view('settings');
});

Route::get('/userCommonPost','userAuthController@getUserCommon');

Route::get('/delMessageCommon/{getUser}','userAuthController@delMessageCommon');

Route::post('/perm/{permission}','userAuthController@settingsData');

Route::get('/CommonPosting','userAuthController@pusNavigate');

Route::post('/che','userAuthController@messageEnteredByAdmin');

Route::post('/delUserPost','userAuthController@updPostDel');

Route::post('/cheUser','userAuthController@messageEnteredByUser');


Route::get('/testingForFun','userAuthController@testingFun');

Route::get('/testForEncryption','userAuthController@encyrCheck');

Route::group(['prefix'=>'api','middleware'=>'api'],function(){
  Route::resource('books','BooksController');
});
