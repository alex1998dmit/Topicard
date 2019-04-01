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


Route::get('/user/{id}', 'UsersController@show')->name('user');

Route::get('/categories', 'CategoriesContoller@index')->name('categories');
Route::get('/category/{id}', 'CategoriesController@show')->name('category');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/topics/create/search', function(Request $request) {
    $searchTerm =  $request->get('name');
    $categories = Category::where('name','LIKE','%'.$searchTerm.'%')->get();
    return json_encode($categories);
})->name('topics.search');

Route::post('/topic/like', function(Request $request) {

});

Route::post('/topic/like/{id}', 'LikesController@like')->name('topic.like');
Route::post('/topic/dislike/{id}', 'LikesController@dislike')->name('topic.dislike');
