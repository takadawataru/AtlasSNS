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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');



//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/logout','UsersController@logout');

Route::get('/search','UsersController@search');
Route::post('/search_result','UsersController@index');

Route::get('/follow-list','FollowsController@followList_icon');
Route::get('/follower-list','FollowsController@followerList_icon');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

Route::post('post/create','PostsController@create');
Route::get('index','PostsController@index');

Route::get('post/{id}/update-form','PostsController@updateForm');
Route::post('post/update','PostsController@update');
Route::get('post/{id}/delete','PostsController@delete');

Route::post('/follow/{user}','UsersController@follow')->name('follow');
Route::post('/un_follow/{user}','UsersController@un_follow')->name('un_follow');

Route::post('post/edit', 'PostsController@edit');

Route::post('/bbs', 'UsersController@user_update');

Route::get('post/{id}/otherProfile','UsersController@otherProfile');



//Route::get('/', 'postsController@index');
//Route::post('posts', 'postsController@store');
