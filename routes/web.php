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
/*
Route::get('/', function () {
    return view('welcome',$data) ;
});


Route::get('/landing', function () {
    return view('landing') ;
});

Route::get('index','Fronts\UserControllerTest@sayhello');


Route::group(['namespace'=>'users'], function (){

    Route::get('second','UserController@show1')    ->middleware('auth');

});

Route::get('login',function (){
    return 'validate registration login';
}) ->name('login');



route::group(['namespace=>front'],function (){

    route::get('users','front/UserController@getuser');

});
*/



/*


Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home') ->middleware('verified');


Route::get('/',function (){

    return 'home';
});

Route::get('/dashboard', function(){

    return 'dashboard';
});
*/

/*

Route::get('/redirect/{service}','UserControllers@redirect');

Route::get('/callback/{service}','UserControllers@callback');
*/

Route::get('fill', 'NameController@setstamp');


Route::group(['prefix' => 'offers'], function (){
  // Route::get('allow','NameController@row');

 //   Route::group(['prefix' => LaravelLocalization::setLocale(),
   // 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {

        Route::get('create', 'NameController@open');
    //});
    Route::POST('store','NameController@store') -> name('offers.store');

});
