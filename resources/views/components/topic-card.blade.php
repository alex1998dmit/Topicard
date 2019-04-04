<div class="col-md-6 col-12">
  <div class="row p-3 ml-0 my-2 align-items-center justify-content-between topic-card">
    <a href="{{ route('topic', ['id' => $topic->id]) }}" class="block-link"></a>
    <div class="w-100 d-flex justify-content-between">
      <h2 class="col h3 col topic-card__title mb-1 text-restriction">{{ $topic->title }}</h2>
      <div class="col-auto justify-self-end topic-card__buttons">
        @if(Auth::id() === $topic->user->id)
            <a href="#" class="btn btn-success rounded-circle topic-card__btn">3</a>
        @endif
      </div>
    </div>
    <div class="w-100">
      <a class="topic-card__link col-auto pr-1" href="{{ route('user', ['id' => $topic->user->id]) }}">{{ $topic->user->name }}</a>
      <span class="col-auto topic-card__date">{{ $topic->created_at }}</span>
    </div>
    <div class="w-100"></div>
    <div class="row col ml-0">
        @foreach($topic->category as $category)
          <img src="{{ asset('uploads/categories_avatars/' . $category->avatar) }}" alt="category" width="20px" height="20px">
          <a href="{{ route('category.single', ['id' => $category->id]) }}" class="topic-card__category topic-card__link col-auto pl-1 pr-2">{{ $category->name }}</a>
        @endforeach
    </div>
    <div class="row col-12">
        <div class="col">
            <hr class="col-12 mt-1">
        </div>
    </div>
    <div class="col-12 text-restriction">
        {{ $topic->content }}
    </div>
    <div class="col-auto justify-self-end topic-card__buttons mt-3">
      @if(Auth::id() === $topic->user->id)
        <a class="btn btn-info topic-card__btn topic-card__edit" href="{{ route('topic.edit', ['id' => $topic->id ])}}">Редактировать</a>
        <a class="btn btn-danger topic-card__btn topic-card__delete" data-id={{ $topic->id }} href="#" id="delete_topic">Удалить</a>
      @endif
    </div>
  </div>
</div>
