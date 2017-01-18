<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',['middleware' => 'guest',function () {
    return redirect('/home');
}]);

Auth::routes();


Route::get('/home', 'HomeController@index');

Route::get('/event/ticket/buy/{event}','TicketController@buy');
Route::get('/event/ticket/mytickets','TicketController@mytickets');
Route::post('/event/ticket/download/{transaction}','TicketController@download');
Route::post('/event/ticket/buy/{event}','TicketController@create');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){

    Route::get('/admin/create_admin','AdminController@create_admin');
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::post('/admin/create_admin','AdminController@register');
        Route::post('/admin/test','AdminController@test_sms');




});

Route::group(['middleware' => 'App\Http\Middleware\MerchantMiddleware'], function(){
//manage events and tickets
   Route::get('/events','EventController@index');
   Route::get('/event/create','EventController@create');
   Route::post('/event','EventController@store');
   Route::delete('/event/{event}','EventController@destroy');
   Route::get('/event/tickets/manage/{event}','TicketController@index');
   Route::post('/event/tickets/manage/create/{event_id}','TicketController@store');
   Route::delete('/event/tickets/manage/delete/{event_id}/{ticket}','TicketController@destroy');

});

