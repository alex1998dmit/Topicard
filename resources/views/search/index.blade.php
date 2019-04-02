@extends('layouts.app')

    @section('content')

        <div class="row">
            <div class="col-md-12">
                <p>Найдено:</p> <b>{{$topics->count() }}</b>
            </div>
            <div class="col-md-12">
                @foreach ($topics as $topic)
                <div class="row">
                        <div class="col-md-1">
                                {{$topic ->title }}
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
                            <div class="col-md-2">
                                    {{ $topic->likes->count() }}
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('topic', ['id' => $topic->id]) }}">Посмотреть</a>
                            </div>
                </div>
            </div>
                @endforeach

        </div>
    @endsection
