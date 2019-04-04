@extends('layouts.app')
@section('content')
  <div class="row my-4">
    <form class="col-12" action="{{ route('search.test') }}" method="get" role="search">
      {{ csrf_field() }}
        <div class="input-group">
            <input class="form-control" placeholder="{{ __('Поиск категории') }}" type="text" name="search" id="search_form">
            <div class="input-group-append">
                <button type="submit" class="btn search-button">Найти</button>
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
    let url = "{{ route('category.subscribe') }}";

    // $( ".subscribe_button" ).click(function(e) {
    //     e.preventDefault();
    //     let id = $(this).data('id');
    //     console.log(id);
    //     $.ajax({
    //         url:url,
    //         type: 'POST',
    //         data:{ user_id: id, _token: CSRF_TOKEN },
    //         dataType: 'json',
    //         success: function(data) {

    //             console.log(data);
    //         },
    //     });
    // });

    });


</script>

@endsection
