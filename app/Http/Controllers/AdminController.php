<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Category;
use App\User;
use Carbon\Carbon;



class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $new_users = $users->where('created_at', '>=', Carbon::now()->startOfDay()->toDateTimeString());
        $topics = Topic::all();
        $new_topics = $topics->where('created_at', '>=', Carbon::now()->startOfDay()->toDateTimeString());
        $categories = Category::all();
        $new_categories = $categories->where('created_at', '>=', Carbon::now()->startOfDay()->toDateTimeString());

        return view('admin.index')->with('users', $users)
                                  ->with('topics', $topics)
                                  ->with('categories', $categories)
        
                                  ->with('new_users', $new_users)
                                  ->with('new_topics', $new_topics)
                                  ->with('new_categories', $new_categories);
    }
}
