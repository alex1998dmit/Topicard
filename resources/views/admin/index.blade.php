@extends('layouts.app')
    @section('content')

        <div class="row">
           @include('admin.includes.menu')
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">
                    Индекс
                </div>
                <div class="card-body">
                    <p class="card-text">Пользователей: {{ $users->count() }}</p>
                    <p class="card-text">Новых пользователей:  {{ $new_users->count() }}</p>
                    <p class="card-text">Топиков: {{ $topics->count() }}</p>
                    <p class="card-text">Топиков сегодня: {{ $new_topics->count() }}</p>
                </div>
                </div>
            </div>
        </div>

    @endsection
