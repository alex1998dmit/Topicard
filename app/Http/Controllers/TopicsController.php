<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Category;
use App\User;
use App\Like;
use Auth;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        if(Auth::user()) {
            $user = User::find(Auth::id());
            $categories = $user->category;
            $topics = [];
            foreach ($categories as $key => $category) {
                array_push($topics, $category->topic);
            }
            dd($topics);

            $category = Category::find(1);
            dd($category->topic);
            $categories = Category::all();
            dd($categories->topic);
            $topics = $categories->topic();
            dd($topics);
        }
        // $topics = Topic::all();
        // $categories =
        // return view('topics.index')->with('topics', $topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_id =  Auth::user()->id;
        $categories = Category::all();
        // $categories = User::find($user_id)->category()->get();
        return view('topics.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'categories' => 'required'
         ]);

         $topic = Topic::create([
             'title' => $request->title,
             'content' => $request->content,
             'user_id' => Auth::id(),
         ]);


         $topic->category()->attach($request->categories);
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $topic = Topic::find($request->id);
        if(!$topic) {
            abort(404);
        }
        $categories = $topic->category;
        return view('topics.single')->with('topic', $topic)->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::find($id);
        $categories = $topic->category;
        return view('topics.edit')->with('topic',$topic )->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $topic = Topic::find($request->id);
        // $this->validate($request, [
        //     'title' => 'required|max:255',
        //     'content' => 'required',
        //  ]);



        $topic->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        $topic->title = $request->title;
        $topic->content = $request->content;
        $topic->save();
        $topic->category()->sync($request->categories);
        return redirect()->route('topics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
