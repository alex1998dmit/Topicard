@extends('layouts.app')

    @section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>{{ $topic->title }}</h3>
        </div>
        <div class="col-md-12">
            <p> {{ $topic->content}}</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach($categories as $category)
                    <a href="">{{ $category->name }}</a>
                @endforeach
            </div>
            <div class="col-md-12">
                @if($topic->is_liked_by_auth())
                    <a href="{{ route('topic.dislike', ['id' => $topic->id]) }}" class="btn btn-danger">Unlike <span class="badge">{{ $topic->likes->count() }}</span></a>
                @else
                    <a href="{{ route('topic.like', ['id' => $topic->id]) }}" class="btn btn-success">Like <span class="badge">{{ $topic->likes->count() }}</span></a>
                @endif
            </div>
        </div>
    </div>

    @endsection


