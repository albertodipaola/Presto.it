@php
    $category = $announcement->category
@endphp
<div class="row">
    <div class="col-12 col-md-6 mb-3">
        <div class="swiper imgSwiper2">
            <div class="swiper-wrapper">
                @forelse ($announcement->images as $image)
                <div class="swiper-slide text-center">
                    <img src="{{$image->getImageCropped($image->path, 500, 500)}}" class="img-fluid" />
                </div>    
                @empty
                <div class="swiper-slide">
                    <img src="/img/img-default.png" class="img-fluid" />
                </div>    
                @endforelse
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination w-auto start-50 translate-middle px-3 bg-dark text-white rounded-pill"></div>
        </div>
        <hr>
        @if (!$announcement->images->isEmpty())
        <div thumbsSlider="" class="swiper imgSwiper">
            <div class="swiper-wrapper">
                @foreach ($announcement->images as $image)
                <div class="swiper-slide">
                    <img src="{{$image->getImageCropped($image->path, 500, 500)}}" class="img-fluid" />
                </div>    
                @endforeach
            </div>
        </div>              
        @endif
    </div>

    <div class="col-12 col-md-6">
        <h2>{{$announcement->title}}</h2>
        <h3>€ {{number_format($announcement->price, 2, ',', '.')}}</h3>
        <a href="{{route('announcements.category', $announcement->category)}}" class="link-orange fs-5">{{__("ui.$category->name")}}</a>
        <div class="card my-3 border-0">
            <div class="row g-0 align-items-center">
                <div class="col-2">
                    <img src="/img/img-default.png" class="img-fluid rounded-circle" alt="...">
                </div>
                <div class="col-10">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->user->name}}</h5>
                        <p class="card-text"><small class="text-muted"><i class="fa-solid fa-calendar"></i>: {{$announcement->created_at->format('d/m/Y')}}</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top">
            <h4>Descrizione</h4>
            <p>{{$announcement->description}}</p>
        </div>    
    </div>
</div>

@if(Route::currentRouteName() == 'revisor.index')
{{-- @foreach ($announcement->images as $image) --}}
@for ($i = 0; $i < count($announcement->images); $i++)
<div class="row border border-3 mb-3">
    <h5>{{__('ui.image')}} n°{{$i+1}}</h5>
    <div class="col-12 col-md-4">
        <h6>{{__('ui.image-revisor')}}</h6>
        <p>{{__('ui.adult')}}: <span class="{{$announcement->images[$i]->adult}}"></span></p>
        <p>{{__('ui.medical')}}: <span class="{{$announcement->images[$i]->medical}}"></span></p>
        <p>{{__('ui.spoof')}}: <span class="{{$announcement->images[$i]->spoof}}"></span></p>
        <p>{{__('ui.violence')}}: <span class="{{$announcement->images[$i]->violence}}"></span></p>
        <p>{{__('ui.racy')}}: <span class="{{$announcement->images[$i]->racy}}"></span></p>
    </div>
    <div class="col-12 col-md-8">
        <h6>{{__('ui.tags')}}</h6>
        <div>
        @foreach ($announcement->images[$i]->lables as $lable)
            <span class="badge bg-secondary rounded-pill">{{$lable}}</span>
        @endforeach
        </div>
    </div>
</div>
@endfor
{{-- @endforeach --}}
@endif