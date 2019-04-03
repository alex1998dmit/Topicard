<?php

use Illuminate\Http\Request;
use App\Topic;
use App\User;
use App\Category;
use App\Repost;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
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
<<<<<<< HEAD
    Route::get('/topics/create', 'TopicsController@create')->name('topics');
    Route::post('/topics', 'TopicsController@store')->name('topic.store');
    Route::get('/topics/edit/{id}', 'TopicsController@edit')->name('topic.edit');
    Route::post('/topics/update', 'TopicsContoller@update')->name('topic.update');

=======
    Route::get('/topics/create', 'TopicsController@create')->name('topics.create');
>>>>>>> 0bb2b9d5a7abaaba5296a08ef9629516d76be38d
    Route::post('/topic/like/{id}', 'LikesController@like')->name('topic.like');
    Route::post('/topic/dislike/{id}', 'LikesController@dislike')->name('topic.dislike');

    Route::post('/topic/save', function(Request $request) {
        $id = $request['id'];
        $repost = Repost::create([
            'topic_id' => $id,
            'user_id' => Auth::id(),
        ]);
        return json_encode([]);
    })->name('topic.save');

    Route::post('/topic/notsave', function(Request $request) {
        $id = $request['id'];
        $repost = Repost::where('topic_id', $id)->where('user_id', Auth::id())->first();
        $repost->delete();
        return json_encode([]);
    })->name('topic.notsave');

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
    Route::post('/admin/categories/store', function(Request $request) {
        $name = Input::get('name');
        $avatar = Input::file('image');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/categories_avatars/' . $filename));
        $category  = Category::create([
            'name' => $name,
            'avatar' => $filename,
        ]);
        return json_encode($category);
    })->name('categories.store');
});

// Route::get('/topic/{id}', function(Request $request) {
//     return view('topics.single', ['id' => $request->id]);
// });

Route::Get('/categories', function() {
    $categories = Category::all();
    return view('categories.index')->with('categories', $categories);
})->name('categories');

Route::Get('/category/{id}', function(Request $request) {
    $category = Category::find($request->id);
    return view('categories.single')->with('category', $category);
})->name('category.single');
