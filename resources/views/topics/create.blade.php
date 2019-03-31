@extends('layouts.app')

    @section('content')
        <form action="{{ route('topic.store') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                            <label for="tags"> Выберите категории</label>
                            @foreach($categories as $category)
                                <div class="checbox">
                                    <label><input type="checkbox" name="categories[]" value="{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
            <hr>
            <div class="row col-md-12">
                <div class="row">
                    <div class="form-group">
                        <textarea name="content" id="content" cols="150" rows="20" placeholder="Содержание топика" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    {{-- <a class="btn btn-danger mr-2" href="{{ route('user', ['id' => Auth::id()]) }}}">Удалить</a> --}}
                    <button class="btn btn-success" type="submit">Сохранить</button>
                </div>
            </div>
        </form>
    @endsection
