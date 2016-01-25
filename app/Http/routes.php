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

use App\Http\Controllers\PhotosController;

Route::group(['middleware' => ['web']], function () {
    Route::resource('flyers','FlyersController');
    Route::get('{zip}/{street}', 'FlyersController@show');
    Route::post('{zip}/{street}/photos','PhotosController@store');
//    Route::post('{zip}/{street}/photos', [ 'as' => 'store_photo_path', 'uses' => 'FlyersController@addPhoto']);



});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'PagesController@home');
    Route::get('/home', 'HomeController@index');
    Route::delete('photos/{id}', 'PhotosController@destroy');
});
