<div class="col-md-6 col-12">
  <div class="row p-3 my-2 ml-0 block-category">
    <a href="{{ route('category.single', ['id' => $category->id]) }}" class="block-link"></a>
    <div class="col-3">
      <img class="block-category__image rounded" src="{{ asset('uploads/categories_avatars/' . $category->avatar) }}" alt="">
    </div>
    <div class="col-9">
      <div class="row justify-content-between">
        <h3 class="col text-restriction">{{ $category->name }}</h3>
        <div class="col-auto">
            <form action="{{ route('category.subscribe') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="cat_id" value="{{ $category->id }}">
                    <button class="btn btn-primary block-category__btn subscribe_button"  value="">Подписаться</button>
                    {{-- <a class="btn btn-primary block-category__btn subscribe_button" data-id="{{ $category->id }}" id="subscribe_button" href="#">Подписаться</a> --}}
            </form>
        {{-- <a class="btn btn-primary block-category__btn subscribe_button" data-id="{{ $category->id }}" id="subscribe_button" href="#">Подписаться</a> --}}
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



