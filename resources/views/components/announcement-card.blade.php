@php
    $category = $announcement->category
@endphp

<a href="{{route('announcements.show', $announcement)}}" class="text-decoration-none text-dark">
  <div class="card card-shadow">
    @if (!$announcement->images->isEmpty())
    <img src="{{$announcement->images->first()->getImageCropped($announcement->images->first()->path, 500, 500)}}" class="card-img-top" alt="...">
    @else
    <img src="/img/img-default.png" class="card-img-top" alt="{{$announcement->title}}">
    @endif
    <div class="card-body">
      <h4 class="card-title">€ {{number_format($announcement->price, 2, ',', '.')}}</h4>
      <h5 class="card-subtitle">
        {{substr($announcement->title, 0, 20)}}
        @if (strlen($announcement->title) >= 20) ... @endif
      </h5>
      <a href="{{route('announcements.category', $announcement->category)}}" class="card-link link-orange">{{__("ui.$category->name")}}</a>
    </div>
  </div>
</a>