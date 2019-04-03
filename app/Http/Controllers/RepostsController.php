<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepostsController extends Controller
{
    //
    public function save (Request $request) {

    }

    public function notsave(Request $request) {
        $id = $request['id'];
        $repost = Repost::where('topic_id', $id)->where('user_id', Auth::id())->first();
        $repost->delete();
        return json_encode([]);
    }
}
