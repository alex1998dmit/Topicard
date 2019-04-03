<div class="row p-3 ml-0 my-2 align-items-center justify-content-between pt-2 pb-2 mb-2 topic-card">
  <a href="#" class="block-link"></a>
  <div class="w-100 d-flex justify-content-between">
    <h2 class="col-auto h3 col topic-card__title mb-1">{{ $topic->title }}</h2>
    <!-- guest and user id -->
    <div class="col-auto justify-self-end topic-card__buttons">
      <a class="btn btn-info topic-card__btn topic-card__edit" href="#">Редактировать</a>
      <a class="btn btn-danger topic-card__btn topic-card__delete" href="#">Удалить</a>
    </div>
  </div>
  <div class="w-100">
    <a class="topic-card__link col-auto pr-1" href="#">{{ $topic->user->name }}</a>
    <span class="col-auto topic-card__date">{{ $topic->created_at }}</span>
  </div>
  <div class="w-100"></div>
  <div class="d-flex flex-wrap">
      @foreach($topic->category as $category)
          <a href="#" class="topic-card__category topic-card__link col-auto pr-1">{{ $category->name }}</a>
      @endforeach
  </div>
  <div class="row col-12">
      <div class="col">
          <hr class="col-12 mt-1">
      </div>
  </div>
  <div class="col-12 topic-card__text">
      {{ $topic->content }}
  </div>
</div>
