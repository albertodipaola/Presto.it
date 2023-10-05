<nav class="navbar navbar-expand-lg bg-nav sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">
        Presto
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{route('announcements.create')}}">{{__('ui.new-ann')}}</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.categories')}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('announcements.index')}}">{{__('ui.all-ann')}}</a></li>
              @foreach ($categories as $category)
                <li><a class="dropdown-item" href="{{route('announcements.category', $category)}}">{{__("ui.$category->name")}}</a></li>
              @endforeach
            </ul>
          </li>
        </ul>

        <ul class="navbar-nav mx-auto my-2 my-lg-0">
          <form class="d-flex" role="search">
            <div class="input-group">
              <input class="form-control rounded-start-pill" type="search" placeholder="{{__('ui.search')}}">
              <button class="btn btn-nav rounded-end-pill" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
          </form>  
        </ul>

        <ul class="navbar-nav ms-auto my-2 my-lg-0">
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">{{__('ui.log-in')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-nav" href="{{route('register')}}">{{__('ui.sign-up')}}</a>
          </li>
          @endguest
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.hello')}}{{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">{{__('ui.see-profile')}}</a></li>
              @if (Auth::user()->is_revisor)
                <li>
                  <a class="dropdown-item position" href="{{route('revisor.index')}}">
                    {{__('ui.revisor')}}
                    <span class="badge bg-danger rounded-pill">
                      {{App\Http\Controllers\RevisorController::countRevisioned()}}
                    </span>
                  </a>
                </li>
              @endif
              <li class="dropdown-item">
                <form action="{{route('logout')}}" method="post">
                  @csrf
                  <button class="btn text-danger text-start p-0 w-100" type="submit">{{__('ui.log-out')}}</button>
                </form>
              </li>
            </ul>
          </li>
          @endauth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-globe"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li> <x-local lang='it' /> </li>
              <li> <x-local lang='en' /> </li>
              <li> <x-local lang='es' /> </li>
            </ul>
          </li>  
        </ul>
      </div>
    </div>
</nav>