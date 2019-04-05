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
                <span class="h5">Карма: {{ $likes }}</span>
            </div>
        </div>
        <div class="col-sm-9 pl-4">
            <div class="row topics__all mb-3">
                @if(Auth::id() === $user->id)
                    <h2 class="col-12">Ваши топики:</h2>
                @else
                    <h2 class="col-12">Топики {{ $user->name }}:</h2>
                @endif
                <div class="col-12">
                    <div class="row">
                        @foreach($topics as $topic)
                            @include('components.topic-card', ['topic' => $topic])
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row topics__saved mb-3">
                <h2 class="col">Сохраненные топики:</h2>
                <div class="col-12">
                    <div class="row">
                        @foreach($saved_topics as $topic)
                            @include('components.topic-card', ['topic' => $topic])
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row topics__categories mb-3">
                <h2 class="col">Избранные категории:</h2>
                <div class="col-12">
                    <div class="row">
                        @foreach($user->category as $category)
                            @include('components.block-category', ['category' => $category])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>


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
                $(`input[data-id=${data.id}]`).replaceWith(`<input class="btn btn-success block-category__btn unsubscribe_button" type="submit" data-id="${data.id}" value="Отписаться">`)
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
                $(`input[data-id=${id}]`).replaceWith(`<input class="btn btn-info block-category__btn subscribe_button" data-id=${id} type="submit" value="Подписаться">`)
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



</script>
@endsection
