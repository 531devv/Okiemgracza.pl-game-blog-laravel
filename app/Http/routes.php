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

Route::group(['middleware' => ['web']], function () {
  //authentication Routes
  Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
  Route::post('auth/login', 'Auth\AuthController@postLogin');
  Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

  //registration Routes
  //Route::get('auth/register', 'Auth\AuthController@getRegister');
  //Route::post('auth/register', 'Auth\AuthController@postRegister');
  Route::get('about', 'AboutController@getAbout');
  Route::get('privacy', 'AboutController@getPrivacy');
  Route::get('contact', ['as' => 'contact', 'uses' => 'AboutController@getCreate']);
  Route::post('contact', ['as' => 'contact_store', 'uses' => 'AboutController@getStore']);
  Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
  Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
  Route::get('/', 'PagesController@getIndex');
  Route::get('games', 'PagesController@getGames');
  Route::get('news', 'PagesController@getSingle');
  Route::resource('posts', 'PostController');
});
