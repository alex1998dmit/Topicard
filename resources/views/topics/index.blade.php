@extends('layouts.app')
@section('content')
    <div class="container my-3">
        @foreach($topics as $topic)
            @include('components.topic-card', ['topic' => $topic])
        @endforeach
    </div>
@endsection
