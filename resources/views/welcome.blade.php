<x-layout>
    <main class="container my-3">
        <div class="row">
            <div class="col-12 col-md-6 imghead">
            </div>
            <div class="col-12 col-md-6 text-center align-self-center">
                <h1>{{__('ui.head-h1')}}</h1>
                <p class="fs-5">{{__('ui.head-p')}}</p>
                <div class="d-flex justify-content-evenly mt-3">
                    <a href="{{route('announcements.create')}}" class="btn-orange px-5 me-3 fs-4">{{__('ui.sell')}}</a>
                    <a href="{{route('announcements.index')}}" class="btn-orange px-5 me-3 fs-4">{{__('ui.buy')}}</a>
                </div>
            </div>
        </div>
    </main>

    <div class="container">
        <div class="row">
            <div class="col"><h2>{{__('ui.last-ann')}}</h2></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="swiper swiper-ann">
                    <div class="swiper-wrapper py-5">
                        @foreach ($announcements as $announcement)
                        <div class="swiper-slide">
                            <x-announcement-card :announcement='$announcement' />
                        </div>
                        @endforeach

                        @if (count($announcements) == 8)
                        <div class="swiper-slide">
                            <div class="py-5 text-center">
                                <a href="{{route('announcements.index')}}" class="text-decoration-none link-orange">
                                    <i class="fa-solid fa-2xl fa-circle-arrow-right mb-4"></i>
                                    <p>{{__('ui.other-ann')}}</p>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>                
            </div>
        </div>
    </div>
</x-layout>