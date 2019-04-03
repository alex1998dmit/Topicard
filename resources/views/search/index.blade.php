@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-4">
            <h2>Найденные топики: {{ $topics->count() }}</h2>
        </div>
        <div class="col-md-12">
            @foreach ($topics as $topic)
                @include('components.topic-card', ['topic' => $topic])
            @endforeach
        </div>
    </div>
@endsection
