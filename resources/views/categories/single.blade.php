@extends('layouts.app')
@section('content')
  <div class="row mt-4 mb-1">
    <div class="col-12">
        <h2>Топики категории: {{ $category->name }}</h2>
    </div>
  </div>
  <div class="row">
    @foreach($category->topic as $topic)
        @include('components.topic-card', ['topic' => $topic])
    @endforeach
  </div>
@endsection
