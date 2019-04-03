@extends('layouts.app')
@section('content')
    <!-- <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <img src="{{asset('uploads/avatars/'. $user->avatar)}}" alt="avatar">
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $user->name}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ $user->email}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ $user->role }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    Карма: {{ $likes }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    Топики:
                        @foreach ($topics as $topic)
                            {{ $topic->title }}
                        @endforeach
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12">
                    Сохраненные топики:
                        @foreach ($topics as $topic)
                            {{ $topic->title }}
                        @endforeach
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12">
                    Вы подписаны на следующие категории:
                        @foreach ($topics as $topic)
                            {{ $topic->title }}
                        @endforeach
                </div>
            </div>
        </div>
    </div> -->
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
        <div class="col-sm-9">
            <div class="row topics__all">
                <h2 class="col">Ваши топики:</h2>
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
