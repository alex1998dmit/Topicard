@extends('layouts.app')

    @section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>{{ $topic->title }}</h3>
        </div>
        <div class="col-md-12">
            <p> {{ $topic->content}}</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach($categories as $category)
                    <a href="">{{ $category->name }}</a>
                @endforeach
            </div>
            <div class="col-md-12">
                <div class="rating" id="rating">
                        @if($topic->is_liked_by_auth())
                        {{-- <a href="{{ route('topic.dislike', ['id' => $topic->id]) }}" class="btn btn-danger" id="unlike_button">Unlike <span class="badge">{{ $topic->likes->count() }}</span></a> --}}
                            <input type="submit" value="unlike" class="btn btn-danger" id="unlike_button">{{ $topic->likes->count() }}
                    @else
                            <input type="submit" value="like" class="btn btn-success" id="like_button">{{ $topic->likes->count() }}
                    @endif
                </div>
            </div>
             <div class="col-md-12">
                    <div class="reposts" id="reposts">
                            @if($topic->is_reposted_by_auth())
                                 <input type="submit" value="Saved" class="btn btn-info" id="unrepost_button">
                            @else
                                <input type="submit" value="Press to save" class="btn btn-info" id="repost_button">
                            @endif
                    </div>
            </div>
            <div class="col-md-12">
                <b>Author: </b> {{ $topic->user->name }}
                <img src="" alt="">
            </div>
        </div>
    </div>
    <script>
        let url_dislike = "{{ route('topic.dislike', ['id' => $topic->id]) }}";
        let url_like = "{{ route('topic.like', ['id' => $topic->id]) }}";

        let url_save = "{{ route('topic.save') }} ";
        let url_notsave= "{{ route('topic.notsave') }} ";
        let token = '{{ Session::token() }}';
        let id = '{{ $topic->id }}';
        let disable = false;

        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $(document).on("click", '#repost_button', function(){

                disable = true;
                $.ajax({
                    url:url_save,
                    type: 'POST',
                    data:{ id: id, _token: CSRF_TOKEN },
                    dataType: 'json',
                    success: function(data) {
                        $('#reposts').html(`
                            <input type="submit" value="Saved" class="btn btn-info" id="unrepost_button" />
                        `);
                        disable = false;
                    },
                });
                return false;
            });

            $(document).on("click", '#unrepost_button', function(){
                disable = true;
                $.ajax({
                    url:url_notsave,
                    type: 'POST',
                    data:{ id: id, _token: CSRF_TOKEN },
                    dataType: 'json',
                    success: function(data) {
                        $('#reposts').html(`
                            <input type="submit" value="Press to save" class="btn btn-info" id="repost_button" />
                        `);
                        disable = false;
                    },
                });
                return false;
            });


            $(document).on("click", '#unlike_button', function(){
                disable = true;
                $.ajax({
                    url:url_dislike,
                    type: 'POST',
                    data:{_token: CSRF_TOKEN },
                    dataType: 'json',
                    success: function(data) {
                        $('#rating').html(`
                            <input type="submit" value="like" class="btn btn-success" id="like_button" />${data.likes}
                        `);
                        disable = false;
                    },
                });
                return false;
            });

            $(document).on("click", '#like_button', function(){
                disable = true;
                $.ajax({
                    url:url_like,
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        $('#rating').html(`
                            <input type="submit" value="unlike" class="btn btn-danger" id="unlike_button" />${data.likes}
                        `);
                        disable = false;
                    },
                });
                return false;
            });

            $(document).on("click", '#like_button', function(){
                if(disable) {
                    $('#like_button').hide();
                }
            });

            $(document).on("click", '#unlike_button', function(){
                if(disable) {
                    $('#unlike_button').hide();
                }
            });

            $(document).on("click", '#repost_button', function(){
                if(disable) {
                    $('#repost_button').hide();
                }
            });

            $(document).on("click", '#unrepost_button', function(){
                if(disable) {
                    $('#unrepost_button').hide();
                }
            });

        });
    </script>

    @endsection


