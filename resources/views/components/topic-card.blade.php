<div class="card">
  <div class="card-body">
    <h2 class="h3">{{ $title }}</h2>
    <div class="d-flex flex-wrap">
      <a href="{{ $author }}">{{ $author-name }}</a>
      <span>{{ $date }}</span>
    </div>
    <div class="d-flex flex-wrap">
      @foreach($categories as $category)
        <span class="pr-2">{{ $category }}</span>
      @endforeach
    </div>
    <p class="card-text">{{ $text }}</p>
    <a href="#" class="x-link-only-hover">Узнать больше</a>
  </div>
</div>
