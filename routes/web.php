<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','UiController@index');
Route::get('/posts','UiController@postindex');
Route::get('/posts/{id}/postdetail','UiController@post_deatailIndex');
Route::get('/search_posts','UiController@search');
Route::get('/search_posts_by_category/{catId}','UiController@search_category');

Route::post('/post/comment/{postId}','CommentController@comment');

Route::post('/post/like/{postId}','LikeDislikeController@like');
Route::post('/post/dislike/{postId}','LikeDislikeController@dislike');

Route::group(['middleware' => ['auth', 'isAdmin'] , 'prefix' =>'admin'], function(){
    Route::get('/dashboard', 'admin\AdminDashboardController@index');

    // User
    Route::get('/users', 'admin\UserController@index');
    Route::get('/users/{id}/edit', 'admin\UserController@edit');
    Route::post('/users/{id}/update', 'admin\UserController@update');
    Route::post('/users/{id}/delete', 'admin\UserController@delete');

    // Skill
    Route::resource('skills','admin\SkillController');
    // Project
    Route::resource('projects','admin\ProjectController');
    // Category
    Route::resource('categories','admin\CategoryController');
    // Post
    Route::resource('posts','admin\PostController');
    Route::post('comments/{id}/show_hide','admin\PostController@showHideComment');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
