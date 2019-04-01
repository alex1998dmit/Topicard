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
                    <label for="">Полезная статья ?</label>
                    <div>
                        <label for=""><input type="radio" id="like" name="liked" value="true">
                            Полезно
                        </label>
                    <div>
                    <div class="likes_dislike" id="likes_dislike">
                        <label for=""><input type="radio" id="like" name="liked" value="false">
                            Не полезно
                        </label>
                    </div>
            </div>
        </div>
    </div>

    @endsection


