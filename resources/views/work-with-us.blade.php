<x-layout>
    <div class="container min-vh-100 mt-3">
        <div class="row">
            <div class="col">
                <h2>Lavora con noi!</h2>
                <p>Vuoi entrare nella nostra famimglia? Diventare revisore! Basta compilare il form qui sotto.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form class="border p-3" action="{{route('become-revisor')}}" method="get">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Indirizzo Email</label>
                        <input type="email" value="{{$user->email}}" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Perchè vuoi diventare revisore?</label>
                        <textarea name="body" class="form-control" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn-orange w-100">Invia</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>