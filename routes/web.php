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
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@registerForm');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');



//ログイン中のページ
Route::get('/top','PostsController@index')->middleware('auth');

Route::get('/profile','UsersController@profile')->middleware('auth');

Route::get('/logout','UsersController@logout')->middleware('auth');

Route::get('/search','UsersController@search')->middleware('auth');
Route::post('/search_result','UsersController@index')->middleware('auth');

Route::get('/follow-list','FollowsController@followList_icon')->middleware('auth');
Route::get('/follower-list','FollowsController@followerList_icon')->middleware('auth');

Route::get('/follow-list','FollowsController@followList')->middleware('auth');
Route::get('/follower-list','FollowsController@followerList')->middleware('auth');

Route::post('post/create','PostsController@create')->middleware('auth');
Route::get('index','PostsController@index')->middleware('auth');

Route::get('post/{id}/update-form','PostsController@updateForm')->middleware('auth');
Route::post('post/update','PostsController@update')->middleware('auth');
Route::get('post/{id}/delete','PostsController@delete')->middleware('auth');

Route::post('/follow/{user}','UsersController@follow')->name('follow')->middleware('auth');
Route::post('/un_follow/{user}','UsersController@un_follow')->name('un_follow')->middleware('auth');

Route::post('post/edit', 'PostsController@edit')->middleware('auth');

Route::post('/bbs', 'UsersController@user_update')->middleware('auth');

Route::get('post/{id}/otherProfile','UsersController@otherProfile')->middleware('auth');




//Route::get('/', 'postsController@index');
//Route::post('posts', 'postsController@store');
