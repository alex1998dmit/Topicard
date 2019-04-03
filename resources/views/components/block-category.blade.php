<div class="col-md-6 col-12">
  <div class="row p-3 my-2 ml-0 block-category">
    <a href="{{ route('category.single', ['id' => $category->id]) }}" class="block-link"></a>
    <div class="col-3">
      <img class="block-category__image rounded" src="{{ asset('uploads/avatars/default.jpg') }}" alt="">
    </div>
    <div class="col-9">
      <div class="row justify-content-between">
        <h3 class="col text-restriction">{{ $category->name }}</h3>
        <div class="col-auto">
          <a class="btn btn-primary block-category__btn" href="#">Подписаться</a>
          <!-- OR btn-success -->
        </div>
      </div>
      <span>Лайков:</span>
      <div class="w-100"></div>
      <span>Топиков: {{ $category->topic->count() }}</span>
      <div class="w-100"></div>
      <span>Подписчков:</span>
    </div>
  </div>
</div>
