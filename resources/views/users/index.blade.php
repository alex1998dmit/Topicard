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
                <span class="h5">Карма: {{ $user->linkes }}</span>
            </div>
        </div>
        <div class="col-sm-9 pl-4">
            <div class="row topics__all mb-3">
                <h2 class="col">Ваши топики:</h2>
                <div class="row">
                    <div class="col">
                        @foreach($topics as $topic)
                            <div class="col">
                                @include('components.topic-card', ['topic' => $topic])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row topics__saved">
                <h2 class="col">Сохраненные топики:</h2>
            </div>
            <div class="row topics__categories">
                <h2 class="col">Избранные категории:</h2>
            </div>
        </div>
    </div>
@endsection
