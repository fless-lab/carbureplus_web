@extends("compagnie.layout.base")

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Nos stations</h3>
        </div>
        <br>
        <div class="awards">
            <div class="row">
                @forelse ($stations as $station)
                    <div class="col-md-3 col-sm-6">
                        <a href="{{route("compagnie.station.show",$station->mime)}}">
                            <div class="award-item">
                                <div class="hexagon">
                                    <span class="lnr lnr-drop award-icon"></span>
                                </div>
                                <span class="text-center">{{$station->nom}}</span>
                            </div>
                        </a>
                    </div>
                @empty
                    <h4 class="text-center">Aucune station trouvée</h4>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
