@extends('layouts.app')
@section('content')
  <div class="row my-4">
    <form class="col-12" action="{{ route('search.test') }}" method="get" role="search">
      {{ csrf_field() }}
        <div class="input-group">
            <input class="form-control" placeholder="{{ __('Поиск категории') }}" type="text" name="search" id="find_category">
            <div class="input-group-append">
                <button type="submit" class="btn search-button" id="search_categories">Найти</button>
            </div>
        </div>
    </form>
  </div>
  <div class="row">
  @foreach($categories as $category)
        @include('components.block-category', ['category' => $category])

  @endforeach
  </div>
  <script>

$(document).ready(function(){

    $.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    let url_subscribe = "{{ route('category.subscribe') }}";
    let url_unsubscribe = "{{ route('category.unsubscribe') }}";
    let url_search_category = "{{ route('search.categories')}}";


    $(document).on("click", ".subscribe_button", function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            url:url_subscribe,
            type: 'POST',
            data:{ id: id, _token: CSRF_TOKEN },
            dataType: 'json',
            success: function(data) {
                $(`input[data-id=${data.id}]`).replaceWith(`<input class="btn btn-success block-category__btn unsubscribe_button" data-id="${data.id}" value="Отписаться">`)
            },
        });
    });

    $(document).on("click", ".unsubscribe_button", function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            url:url_unsubscribe,
            type: 'POST',
            data:{ id: id, _token: CSRF_TOKEN },
            dataType: 'json',
            success: function(data) {
                $(`input[data-id=${id}]`).replaceWith(`<input class="btn btn-info block-category__btn subscribe_button" data-id="{{ $category->id }}" value="Подписаться">`)
            },
        });
    });

    $(document).on("keyup", "#find_category", function(e) {
        e.preventDefault();
        let url_search_categories = "{{  route('categories.search') }}";
        let name = $('#find_category').val();
        $.ajax({
            url:url_search_categories,
            type: 'GET',
            data:{ name: name },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                let arrayResult = data.map(el => el.name);
                console.log(arrayResult);
                if(arrayResult.length) {
                    $('#find_category').autocomplete({
                        source: arrayResult,
                        select: function( event, ui ) {
                            let selected_tag = ui.item.value;
                            let selected = data.filter(el =>  {return el.name === selected_tag });
                            let selected_id = selected[0].id;
                            window.location.replace(`http://localhost:8888/topicard/public/category/${selected_id}`);
                        },
                    })
                }
            },
        });
    });



    // AJAX search
    // $(document).ready(function(){
    //         $(document).on('keyup', '#search_form', function(){
    //             var query = $(this).val();
    //             let results;

    //         });
    //     });

});


</script>

@endsection
