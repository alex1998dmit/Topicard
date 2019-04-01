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
                            <input type="submit" value="unlike" class="btn btn-danger" id="unlike_button"> <span class="badge">{{ $topic->likes->count() }}</span>
                    @else
                            <input type="submit" value="like" class="btn btn-success" id="like_button"> <span class="badge">{{ $topic->likes->count() }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        let url_dislike = "{{ route('topic.dislike', ['id' => $topic->id]) }}";
        let url_like = "{{ route('topic.like', ['id' => $topic->id]) }}";
    </script>

    @endsection


