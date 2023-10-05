<x-layout>
    <div class="container min-vh-100 mt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <h1 class="text-center">{{__('ui.log-in')}}</h1>
                <form class="border p-3" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingMail" placeholder=" " name="email">
                        <label for="floatingMail">{{__('ui.email')}}</label>
                    </div>
                    <div class="form-floating mb-3 d-flex">
                        <input type="password" id="password" class="form-control" id="floatingPassword" placeholder=" " name="password">
                        <label for="floatingPassword">{{__('ui.password')}}</label>
                        <button type="button" id="eye" class="btn btn-light border ms-2"><i class="fa-solid fa-eye"></i></button>
                    </div>     
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                        <label class="form-check-label" for="exampleCheck1">{{__('ui.remember')}}</label>
                    </div>
                    <button type="submit" class="btn-orange w-100">{{__('ui.log-in')}}</button>
                </form>
                <p>{{__('ui.go-register')}} <span><a href="{{route('register')}}" class="link-orange">{{__('ui.sign-up')}}!</a></span></p>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
        </div>
    </div>
</x-layout>