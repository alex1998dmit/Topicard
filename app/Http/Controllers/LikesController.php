<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Like;
use Auth;

class LikesController extends Controller
{
    public function like($id)
    {
        Like::create([
            'topic_id' => $id,
            'user_id' => Auth::id(),
        ]);
        return redirect()->back();
    }

    public function dislike($id)
    {
        $like = Like::where('topic_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        return redirect()->back();
    }
}
