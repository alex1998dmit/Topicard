<?php

use Illuminate\Http\Request;
use App\Topic;
use App\User;
use App\Category;
use App\Repost;

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

Route::get('/', function() {
    return redirect()->route('topics');
});

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/topics/create', 'TopicsController@create')->name('topics');
    Route::post('/topic/like/{id}', 'LikesController@like')->name('topic.like');
    Route::post('/topic/dislike/{id}', 'LikesController@dislike')->name('topic.dislike');
    Route::post('/topic/unrepost/{id}', 'RepostsController@unrepost')->name('topic.unrepost');
    Route::post('/topic/repost', function(Request $request) {
        $id = $request['id'];
        $repost = Repost::create([
            'topic_id' => $id,
            'user_id' => Auth::id(),
        ]);
        return json_encode([]);
    })->name('topic.repost');
    Route::post('/topics', 'TopicsController@store')->name('topic.store');
    Route::get('/home', function() {
        return redirect()->route('user', ['id' => Auth::user()->id]);
    })->name('home');
});

Route::get('/topic/{id}', 'TopicsController@show')->name('topic');
Route::get('/topics', 'TopicsController@index')->name('topics');
Route::get('/topics/create/search', 'SearchController@search_categories_api')->name('categories.search');

Route::get('/topics/search', 'SearchController@search_api')->name('topics.search');
Route::any('/search','SearchController@search_index')->name('search.test');

Route::get('/categories', 'CategoriesContoller@index')->name('categories');
Route::get('/category/{id}', 'CategoriesController@show')->name('category');

Route::get('/user/{id}', 'UsersController@show')->name('user');

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin/index', 'AdminController@index')->name('admin.index');
    Route::get('/admin/categories', 'CategoriesController@index')->name('admin.categories');
    Route::post('/admin/categories/store', 'CategoriesController@store')->name('categories.store');
});

// Route::get('/topic/{id}', function(Request $request) {
//     return view('topics.single', ['id' => $request->id]);
// });
