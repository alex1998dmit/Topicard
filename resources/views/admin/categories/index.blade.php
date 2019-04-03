@extends('layouts.app')
    @section('content')

            <div class="row">
                @include('admin.includes.menu')
                 <div class="col-md-8">
                     <div class="card">
                     <div class="card-header">
                         Категории
                     </div>
                     <div class="card-body">
                         <form action="">
                             <label for="category_name">Название категории</label>
                             <input type="text" name="category_name" id="category_name"/>
                             <input type="submit" value="Создать" />
                         </form>
                         <p class="card-text">Пользователей: {{ $users->count() }}</p>
                         <p class="card-text">Новых пользователей:  {{ $new_users->count() }}</p>
                         <p class="card-text">Топиков: {{ $topics->count() }}</p>
                         <p class="card-text">Топиков сегодня: {{ $new_topics->count() }}</p>
                     </div>
                     </div>
                 </div>
             </div>


    @endsection
