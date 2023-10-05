<x-layout>
    <div class="container min-vh-100 mt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <h1 class="text-center">{{__('ui.sign-up')}}</h1>
                <form class="border p-3" method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingMail" placeholder=" " name="name">
                        <label for="floatingMail">{{__('ui.name')}}</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingMail" placeholder=" " name="email">
                        <label for="floatingMail">{{__('ui.email')}}</label>
                    </div>
                    <div class="my-5"></div>
                    <div class="form-floating mb-3 d-flex">
                        <input type="password" id="password" class="form-control" id="floatingPassword" placeholder=" " name="password">
                        <label for="floatingPassword">{{__('ui.password')}}</label>
                        <button type="button" id="eye" class="btn btn btn-light border ms-2"><i class="fa-solid fa-eye"></i></button>
                    </div>     
                    <div class="form-floating mb-3 d-flex">
                        <input type="password" id="password_confirmation" class="form-control" id="floatingPassword" placeholder=" " name="password_confirmation">
                        <label for="floatingPassword">{{__('ui.password-confirmation')}}</label>
                        <button type="button" id="eye_confirmation" class="btn btn btn-light border ms-2"><i class="fa-solid fa-eye"></i></button>
                    </div>                               
                    <button type="submit" class="btn-orange w-100">{{__('ui.sign-up')}}</button>
                </form>
                <p>{{__('ui.go-login')}} <span><a href="{{route('login')}}" class="link-orange">{{__('ui.log-in')}}!</a></span></p>
            </div>
        </div>
    </div>
</x-layout>