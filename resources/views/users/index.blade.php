@extends('layouts.app')
@section('content')
    <div class="row mt-5">
        <div class="col-sm-3">
            <div class="row position-sticky">
                <img class="profile__avatar rounded" src="{{asset('uploads/avatars/'. $user->avatar)}}" alt="avatar">
                <h2 class="pt-3 mb-0"> {{ $user->name }}</h2>
                <div class="w-100"></div>
                <p>{{ $user->email }}</p>
                <div class="w-100"></div>
                <span class="h5">Карма: {{ $likes }}</span>
            </div>
        </div>
        <div class="col-sm-9 pl-4">
            <div class="row topics__all mb-3">
                @if(Auth::id() === $user->id)
                    <h2 class="col-12">Ваши топики:</h2>
                @else
                    <h2 class="col-12">Топики {{ $user->name }}:</h2>
                @endif
                <div class="col-12">
                    <div class="row">
                        @foreach($topics as $topic)
                            @include('components.topic-card', ['topic' => $topic])
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row topics__saved mb-3">
                <h2 class="col">Сохраненные топики:</h2>
                <div class="col-12">
                    <div class="row">
                        @foreach($saved_topics as $topic)
                            @include('components.topic-card', ['topic' => $topic])
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row topics__categories mb-3">
                <h2 class="col">Избранные категории:</h2>
                <div class="col-12">
                    <div class="row">
                        @foreach($user->category as $category)
                            @include('components.block-category', ['category' => $category])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
