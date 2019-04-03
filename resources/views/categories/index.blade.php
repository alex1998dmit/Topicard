@extends('layouts.app')
@section('content')
  <div class="row my-4">
    <form class="col-12" action="{{ route('search.test') }}" method="get" role="search">
      {{ csrf_field() }}
        <div class="input-group">
            <input class="form-control" placeholder="{{ __('Поиск категории') }}" type="text" name="search" id="search_form">
            <div class="input-group-append">
                <button type="submit" class="btn search-button">Найти</button>
            </div>
        </div>
    </form>
  </div>
  <div class="row">
  @foreach($categories as $category)
    @include('components.block-category', ['categories' => $categories])
  @endforeach
  </div>
@endsection
