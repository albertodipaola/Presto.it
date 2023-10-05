<x-layout>
    <div class="container min-vh-100 mt-3">
        <div class="row"><div class="col"><h2>{{__('ui.all-ann')}}</h2></div></div>

        <div class="row justify-content-center">
            @forelse ($announcements as $announcement)
            <div class="col-12 col-md-3 my-3">
                <x-announcement-card :announcement='$announcement' />
            </div>
            @empty
            <div class="col mt-5 text-center">
                <i class="fa-regular fa-2xl fa-circle-xmark"></i>
                <h3>{{__('ui.empty')}}</h3>
                <a href="{{route('announcements.create')}}" class="link-orange">{{__('ui.create-new')}}</a>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>