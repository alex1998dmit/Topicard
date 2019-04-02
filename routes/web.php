<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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

Route::get('/topics/search', function(Request $request) {
    $searchTerm =  $request->get('name');
    $topics = Topic::where('title','LIKE','%'.$searchTerm.'%')->get();
    return json_encode($topics);
})->name('topics.search');

// Route::any('/search', function() {
//     dd('fsafsdafas');
//     return view('search.index');
// })->name('search.index');

Route::any('/search',function(){
    $q = Input::get ( 'search' );
    $topics = Topic::where('title','LIKE','%'.$q.'%')->orWhere('content','LIKE','%'.$q.'%')->get();
    return view ('search.index')->with('topics', $topics);
})->name('search.test');


Route::get('/user/{id}', 'UsersController@show')->name('user');

Route::get('/categories', 'CategoriesContoller@index')->name('categories');
Route::get('/category/{id}', 'CategoriesController@show')->name('category');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/topics/create/search', function(Request $request) {
    $searchTerm =  $request->get('name');
    $categories = Category::where('name','LIKE','%'.$searchTerm.'%')->get();
    return json_encode($categories);
})->name('categories.search');

Route::post('/topic/like/{id}', 'LikesController@like')->name('topic.like');
Route::post('/topic/dislike/{id}', 'LikesController@dislike')->name('topic.dislike');

Route::post('/topic/repost/{id}', 'RepostsController@repost')->name('topic.repost');
Route::post('/topic/unrepost/{id}', 'RepostsController@unrepost')->name('topic.unrepost');
