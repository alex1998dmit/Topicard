@extends('layouts.app')
@section('content')
    <form class="mt-3" action="{{ route('topic.store') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-12">
                <input name="title" id="title" class="form-control" placeholder="Заголовок" value="{{ $topic->title }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12 mb-0" id="search_categories">
                <input type="text" name="search" id="categories_search" class="form-control" placeholder="Введите название категории" />
                <div class="mt-2 checkboxes" id="checkboxes">
                @foreach($categories as $category)
                  <input type="checkbox" id="" name="categories[]" value="{{ $category->id }}" checked/>{{ $category->name }}<br />
                @endforeach
                </div>
            </div>
        </div>
        <hr class="w-100">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <textarea name="content" id="content" cols="150" rows="10" placeholder="Содержание топика" class="form-control">{{ $topic->content }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
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
