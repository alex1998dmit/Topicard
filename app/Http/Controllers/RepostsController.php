<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepostsController extends Controller
{
    //
    public function repost($id)
    {
        dd('here');
        $repost = Repost::create([
            'topic_id' => $id,
            'user_id' => Auth::id(),
        ]);
        return redirect()->back();
        // return json_encode($repost);
        $topic = Topic::find($id);
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
