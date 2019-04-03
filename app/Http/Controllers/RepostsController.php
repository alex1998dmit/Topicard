<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepostsController extends Controller
{
    //
    public function repost($id)
    {
        $repost = Repost::create([
            'topic_id' => $id,
            'user_id' => Auth::id(),
        ]);
        $topic = Topic::find($id);
        $reposts = $topic->reposts->count();
        return json_encode($topic->repost->count());
        // return json_encode(['reposts' => $topic->reposts->count()]);
    }

    public function unrepost($id)
    {
        $repost = Repost::where('topic_id', $id)->where('user_id', Auth::id())->first();
        $repost->delete();
        $topic = Topic::find($id);
        return json_encode(['reposts' => $topic->reposts->count()]);
    }
}
