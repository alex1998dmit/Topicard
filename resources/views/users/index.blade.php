
@extends('layouts.app')

    @section('content')

    <div class="row">
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
    </div>



    @endsection
