@extends('layouts.app')
    @section('content')
        <form action="{{ route('topic.store') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                        <div class="form-group" id="search_categories">
                            <label for="categories_search">Выберите категорию</label>
                            <input type="text" name="search" id="categories_search" class="form-control" placeholder="Введите название категории" />
                        </div>
                        <div class="checkboxes" id="checkboxes">
                            @foreach ($categories as $category)
                            <input type="checkbox" id="" name="categories[]" value="{{ $category->id }}" checked/>{{ $category->name }}<br />
                            @endforeach
                        </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" id="title" class="form-control" value="{{ $topic->title }}">
                </div>
            <div class="row col-md-12">
                <div class="row">
                    <div class="form-group">
                        <textarea name="content" id="content" cols="150" rows="20" placeholder="Содержание топика" class="form-control">{{ $topic->content }} </textarea>
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

        <script>
            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                let url = "{{ route('categories.search') }}";
                let added_categories = [];

                $(document).on('keyup', '#categories_search', function(){
                    var query = $(this).val();
                    $.ajax({
                        url:url,
                        type: 'GET',
                        data:{ name: query },
                        dataType: 'json',
                        delay: 200,
                        success: function(data) {
                            let arrayResult = data.map(el => el.name);
                            if(arrayResult.length) {
                                $('#categories_search').autocomplete({
                                    source: arrayResult,
                                    select: function( event, ui ) {
                                        let selected = data.find(x => x.name === ui.item.value);
                                        if(!added_categories.includes(selected.name)) {
                                            $('#checkboxes').append(`<input type="checkbox" id="" name="categories[]" value="${selected.id}" checked/>${selected.name}<br />`);
                                            added_categories.push(selected.name);
                                        }
                                    },
                                })
                            }
                        },
                    });
                });
            });
        </script>
    @endsection



