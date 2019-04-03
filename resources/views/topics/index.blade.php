@extends('layouts.app')
@section('content')
    <div class="row mt-4 mb-1">
        <div class="col">
            <h2>Все топики:</h2>
        </div>
        <div class="col-auto">
            <a class="btn btn-success topic-card__edit" href="{{ route('topics.create') }}">Создать топик</a>
        </div>
    </div>
    <div class="row">
    @foreach($topics as $topic)
        @include('components.topic-card', ['topic' => $topic])
    @endforeach
    </div>
@endsection

