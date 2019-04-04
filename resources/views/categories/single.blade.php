@extends('layouts.app')
@section('content')
  <div class="row mt-4 mb-1">
    <h2 class="col">Топики категории: {{ $category->name }}</h2>
    <div class="col-auto">
      @if($category->is_subscribed_by_id())
        <input class="btn btn-success unsubscribe_button" type="button" data-id="{{ $category->id }}" value="Отписаться">
      @else
        <input class="btn btn-primary subscribe_button" type="button" data-id="{{ $category->id }}" value="Подписаться">
      @endif
  </div>
  <div class="row">
    @foreach($category->topic as $topic)
        @include('components.topic-card', ['topic' => $topic])
    @endforeach
  </div>
@endsection
