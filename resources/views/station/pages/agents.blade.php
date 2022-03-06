@extends("station.layout.base")
@section('main')
    <div class="container-fluid">


        <div class="row">

            @foreach ($agents as $agent)
                <a class="col-3" href="{{ route("station.agents.transactions",$agent->mime) }}">
                    <div class="card text-center">
                        <h4 class="card-body text-center center">{{ Str::upper($agent->nom)}}
                        {{ Str::ucfirst(Str::lower($agent->prenom))}}</h4>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
@endsection
