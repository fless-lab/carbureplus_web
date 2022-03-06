@extends("station.layout.base")
@section('main')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Agents</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Téléphone</th>
                                        <th>Date d'ajout</th>
                                        <th>Ventes totales</th>
                                        <th>Ventes (ce mois)</th>
                                        <th>Modifier</th>
                                        <th>Désactiver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agents as $agent)
                                        <tr>
                                        <td>{{Str::upper($agent->nom)}}</td>
                                        <td>{{Str::ucfirst(Str::lower($agent->prenom))}}</td>
                                        <td>+228 {{$agent->phone}}</td>
                                        <td>@php
                                            setlocale(LC_TIME, 'fr_FR');
                                            echo strftime('%d %B %G à %H:%m', strtotime($agent->created_at));
                                        @endphp</td>
                                        <td>{{ $agent->total }}</td>
                                        <td>{{ $agent->total_month }}</td>
                                        <td><a href="{{route("station.agent.update",$agent->mime)}}" style="color: green">Modifier</a></td>
                                        <td><a href="#!" style="color: red">Désactiver</a></td>
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
    <script>
        var table = $('#example')
                .DataTable({
                    "language": {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing":     "Traitement...",
                "sSearch":         "Rechercher :",
                "sZeroRecords":    "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":     "Dernier",
                    "sNext":     "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
                }
            },
                });
    </script>
@endsection

