@extends("com_compagnie.layout.base")

@section("main")
<div class="row">
    @forelse ($stations as $station)
    <div class="col-lg-3 col-sm-6">
        <a class="card" href="{{ route("compagnie.stations.ventes",$station->mime) }}">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset("assets/nan.png") }}" width="120px" class="rounded-circle" alt="">
                    <h5 class="mt-3 mb-1">{{ Str::ucfirst($station->nom) }}</h5>
                    <p class="m-0">{{ Str::ucfirst($station->siege) }}</p>
                </div>
            </div>
        </a>
    </div>
    @empty
        <h4>Aucune station trouvée</h4>
    @endforelse

</div>
@endsection
