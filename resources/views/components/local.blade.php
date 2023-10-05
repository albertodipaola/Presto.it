<form action="{{route('set-language', $lang)}}" method="post">
    @csrf
    <button class="btn dropdown-item" type="submit">
        <img src="{{asset("vendor/blade-flags/language-{$lang}.svg")}}" class="img-fluid w-25" alt=""> 
        {{strtoupper($lang)}}
    </button>
</form>