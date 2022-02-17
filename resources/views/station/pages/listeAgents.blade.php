@extends("station.layout.base")
@section('main')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nos agents</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Téléphone</th>
                                        <th>Date d'ajout</th>
                                        <th>Ventes totales</th>
                                        <th>Ventes (ce mois)</th>
                                        <th>Modifier</th>
                                        {{-- <th>Desactiver</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agents as $agent)
                                        <tr>
                                        <td>{{$agent->nom}}</td>
                                        <td>{{$agent->prenom}}</td>
                                        <td>{{$agent->phone}}</td>
                                        <td>{{$agent->created_at}}</td>
                                        <td>{{ $agent->total }}</td>
                                        <td>{{ $agent->total_month }}</td>
                                        <td><a href="{{route("station.agent.update",$agent->mime)}}" style="color: green">Modifier</a></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

