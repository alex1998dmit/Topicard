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
        $like = Like::create([
            'topic_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return json_encode($like);
    }

    public function dislike($id)
    {
        $like = Like::where('topic_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        return json_encode([]);
    }
}
