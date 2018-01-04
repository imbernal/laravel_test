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




Route::get('/',[
    'uses'=> "MainController@index",
    'as' => "hotelsView"
]);

Route::get('/search' ,[
    'uses'=> "MainController@search",
    'as' => "hotelsSearch"
]);

Route::get('/search_by_date' ,[
    'uses'=> "MainController@search_by_date",
    'as' => "hotelsSearch"
]);

Route::post('/payment' ,[
    'uses'=> "MainController@payment",
    'as' => "payment"
]);


