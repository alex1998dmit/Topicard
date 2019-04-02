<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Category;
use App\Topic;

class SearchController extends Controller
{
    public function search_index()
    {
        $query = Input::get ( 'search' );
        $topics = Topic::where('title','LIKE','%'.$query.'%')->orWhere('content','LIKE','%'.$query.'%')->get();
        return view ('search.index')->with('topics', $topics);
    }

    public function search_api(Request $request)
    {
        $searchTerm =  $request->get('name');
        $topics = Topic::where('title','LIKE','%'.$searchTerm.'%')->get();
        return json_encode($topics);
    }

    public function search_categories_api(Request $request)
    {
        $searchTerm =  $request->get('name');
        $categories = Category::where('name','LIKE','%'.$searchTerm.'%')->get();
        return json_encode($categories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    function action(Request $request)
    {
        return 123;
    }
}
