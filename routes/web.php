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
define('paginations',10);

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

    Route::get('getstatus-activated', 'NameController@getsatus');

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


##################  the relation ship has many #####################
route::get('has_many','Rell\RelationController@hospitalanddoctor');
route::get('hospitalss','Rell\RelationController@hospitalss')->name('hospital.all');
route::get('doctorss/{hospital_id}','Rell\RelationController@doctorss')->name('doctor.hospital');
route::get('delete/{hos_id}','Rell\RelationController@deleted')->name('delete.hospital');



route::get('hospital_has_doctor','Rell\RelationController@hospitalhasdoctor');
route::get('hospital_has_doctor_male','Rell\RelationController@hospitalhasdoctormale');
route::get('hospital_not_has_doctor','Rell\RelationController@hospitalnothasdoctor');
route::get('Services','Rell\RelationController@doctortoservices');
route::get('doctoross','Rell\RelationController@getdepartmengt');

route::get('docteor-services-{doc_id}','Rell\RelationController@servicesdoctor')->name('getdepartment.doctor');
route::post('services-ofdoctor','Rell\RelationController@showservicess')->name('save.doctors.services');

##################  theEnd  relation ship has many #####################

##################  has one through  relation ship has many #####################
route::get('get-pationt-doctor','Rell\RelationController@getpationt');


##################End  has one through  relation ship has many #####################
##################  has many through  relation ship has many #####################
route::get('get-country-doctor','Rell\RelationController@getcountry');
Route::get('country-with-doctors','Rell\RelationController@getCountryWithDoctors');

##################End  has many through  relation ship has many #####################


################# start  Accessors & Mutators for Models#####################
Route::get('Accessors','Rell\RelationController@getdata');


################# End  Accessors & Mutators for Models#####################

