<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::post('/settings/website', 'WebsiteController@create')->name('websites:create')->middleware('auth');
Route::put('/settings/website/{websiteId}', 'WebsiteController@update')->name('websites:update')->middleware('auth');

Route::get('websites/{websiteId}/deploy', 'WebsiteDeploymentController@deploy')->name('websites:deploy')->middleware('auth');


Route::get('/JSON/websites/{websiteId}', 'WebsiteController@show');
