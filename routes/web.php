<?php

use Illuminate\Http\Request;
use App\Topic;
use App\User;
use App\Category;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/topic/{id}', 'TopicsController@show')->name('topic');
Route::get('/topics', 'TopicsController@index')->name('topics');
Route::get('/topics/create', 'TopicsController@create')->name('topics');
Route::post('/topics', 'TopicsController@store')->name('topic.store');
Route::post('/topic/like/{id}', 'LikesController@like')->name('topic.like');
Route::post('/topic/dislike/{id}', 'LikesController@dislike')->name('topic.dislike');
Route::post('/topic/repost/{id}', 'RepostsController@repost')->name('topic.repost');
Route::post('/topic/unrepost/{id}', 'RepostsController@unrepost')->name('topic.unrepost');
Route::get('/topics/create/search', 'SearchController@search_categories_api')->name('categories.search');

Route::get('/topics/search', 'SearchController@search_api')->name('topics.search');
Route::any('/search','SearchController@search_index')->name('search.test');

Route::get('/user/{id}', 'UsersController@show')->name('user');

Route::get('/categories', 'CategoriesContoller@index')->name('categories');
Route::get('/category/{id}', 'CategoriesController@show')->name('category');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin/index', function() {
        return view('admin.index');
    })->name('admin.index');
});





