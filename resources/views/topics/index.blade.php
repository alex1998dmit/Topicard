@extends('layouts.app')

    @section('content')
        <div class="container">
                @foreach($topics as $topic)
                <div class="row">
                    <div class="col-md-4">
                        {{$topic ->content}}
                    </div>
                    <div class="col-md-1">
                        {{$topic ->likes}}
                    </div>
                    <div class="col-md-1">
                        {{$topic ->dislikes}}
                    </div>
                    <div class="col-md-2">
                        {{$topic ->created_at}}
                    </div>
                    <div class="col-md-2">
                        @foreach($topic->user as $user)
                            {{ $user->name }}
                        @endforeach
                    </div>
                    <div class="col-md-2">
                        @foreach($topic->category as $category)
                            {{ $category->name }}
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
