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
*/

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







Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home') ->middleware('verified');


Route::get('/',function (){

    return 'home';
});

Route::get('/dashboard', function(){

    return 'dashboard';
});


/*

Route::get('/redirect/{service}','UserControllers@redirect');

Route::get('/callback/{service}','UserControllers@callback');
*/

//Route::get('fill', 'NameController@setstamp');


Route::group(['prefix' => 'offers'], function (){
  // Route::get('allow','NameController@row');


        Route::get('create', 'NameController@open');

        Route::POST('store','NameController@store') -> name('offers.store');

            Route::get('edit/{offer_id}', 'NameController@editOffer')->name('offers.edit');
            Route::get('all', 'NameController@getall')->name('offers.all');

            Route::post('update/{offer_id}','NameController@updateOffer')->name('offers.update');
             Route::get('delete/{offer_id}','NameController@delete')->name('offers.delete');



        //Route::get('edit','NameController@edit');

});

Route::get('youtube', 'VideoController@viewer') ->middleware('auth');
Route::group(['prefix' => 'ajax'], function (){

   route::get('offer' ,'AjaxController@some')->name('ajax.offer');
    route::post('stores' ,'AjaxController@stores')->name('ajax.stores');
    route::get('all','AjaxController@all')->name('ajax.all');
    route::post('deletes','AjaxController@deletes')->name('ajax.deletes');
    Route::get('edited/{offer_id}','AjaxController@edited')->name('ajax.edited');
    Route::post('updates','AjaxController@updates')->name('ajax.updates');

});

Route::group(['middleware' => 'locals', 'namespace ' => 'Auth'], function () {

    Route::get('costam', 'Auth\CustamControllers@allow')->name('costam');
});
//this middleware privet to login between user and admin
route::get('site', 'Auth\CustamControllers@site')-> middleware('auth:web') ->name('site');
route::get('admin', 'Auth\CustamControllers@admin')-> middleware('auth:admin') ->name('admin');

route::get('onec','Rell\RelationController@rell');
