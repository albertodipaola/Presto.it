<x-layout>
    <div class="container min-vh-100 mt-3">
        <div class="row">
            <div class="col"><h2>{{__('ui.revisor')}}</h2></div>
        </div>

        @if ($announcements->isEmpty())
            <div class="row">
                <div class="col mt-5 text-center">
                    <i class="fa-regular fa-2xl fa-circle-xmark"></i>
                    <h3>{{__('ui.no-ann-isrevisioned')}}</h3>
                </div>        
            </div>
        @else
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="bg-orange">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">{{__('ui.title')}}</th>
                        <th scope="col">{{__('ui.category')}}</th>
                        <th scope="col">{{__('ui.actions')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($announcements as $announcement)
                        <tr>
                          <th scope="row">{{$announcement->id}}</th>
                          <td>{{substr($announcement->title, 0, 20)}}</td>
                          <td>{{$announcement->category->name}}</td>
                          <td>
                            <div class="d-flex">
                            <button class="btn-orange" id="modalAnnouncement{{$announcement->id}}" data-bs-toggle="modal" data-bs-target="#modalAnnouncement{{$announcement->id}}"><i class="fa-solid fa-eye"></i></button>
                            <form action="{{route('revisor.accept-announcement', $announcement)}}" method="post">
                                @csrf
                                @method('patch')
                                <button class="btn-green"><i class="fa-solid fa-check"></i></button>
                            </form>
                            <form action="{{route('revisor.reject-announcement', $announcement)}}" method="post">
                                @csrf
                                @method('patch')
                                <button class="btn-red"><i class="fa-solid fa-trash"></i></button>
                            </form>
                            </div>
                          </td>
                        </tr>     
                        
                        {{-- modal --}}
                        <div class="modal fade" id="modalAnnouncement{{$announcement->id}}" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <x-announcement-detail :announcement='$announcement' />
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('revisor.accept-announcement', $announcement)}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button class="btn-green"><i class="fa-solid fa-check"></i></button>
                                    </form>
                                    <form action="{{route('revisor.reject-announcement', $announcement)}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button class="btn-red"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        @endif
    </div>
</x-layout>