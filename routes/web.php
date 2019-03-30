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

Route::get('/topic/{id}', function(Request $request) {
    $topic = Topic::find($request->id);
    dd($topic->user);
});

Route::get('/user/{id}', function(Request $request) {
    $user = User::find($request->id);
    dd($user->category);
});

Route::get('/category/{id}', function(Request $request) {
    $category = Category::find($request->id);
    dd($category->users);
});

Route::get('/home', 'HomeController@index')->name('home');
