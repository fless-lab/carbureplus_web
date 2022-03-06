<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Carbure +</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/logo-mini.png') }}">
    <link href="{{ asset('assets/com_compagnie/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/com_compagnie/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div id="main-wrapper">

        @include('com_compagnie.layout.navbar')

        @include('com_compagnie.layout.sidebar')
        <div class="content-body">



            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ventes</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Numero du client (Paiement/Retour)</th>
                                                <th>Montant (fcfa)</th>
                                                <th>Moyen de payement</th>
                                                <th>Valeur du bon (fcfa)</th>
                                                <th>Monnaie retournée (fcfa)</th>
                                                <th>Status</th>
                                                <th>Date d'enregistrement</th>
                                                <th>Date de validation</th>
                                                <th>Nom de l'agent</th>
                                                <th>Numero de l'agent</th>
                                                <th>Station</th>
                                                <th>Matricule de la vente</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=1
                                            @endphp
                                            @foreach ($ventes as $vente)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $vente->phone??"-" }}</td>
                                                    <td>{{ $vente->montant }}</td>
                                                    <td>{{ $vente->payment_method }}</td>
                                                    <td>{{ $vente->valeur_bon??"-" }}</td>
                                                    <td>{{ $vente->monnaie_recu??"-" }}</td>
                                                    <td>{{ $vente->status }}</td>
                                                    <td>@php
                                                        setlocale(LC_TIME, 'fr_FR');
                                                        echo strftime('%d %B %G à %H:%m', strtotime($vente->created_at));
                                                    @endphp</td>
                                                    <td>@php
                                                        setlocale(LC_TIME, 'fr_FR');
                                                        echo strftime('%d %B %G à %H:%m', strtotime($vente->updated_at));
                                                    @endphp</td>
                                                    <td>{{ Str::upper($vente["agent"]["nom"]) }} {{ Str::ucfirst($vente["agent"]["prenom"]) }}</td>
                                                    <td>+228 {{ $vente["agent"]["phone"] }}</td>
                                                    <td>{{ $vente["station"]["nom"] }}</td>
                                                    <td>{{ $vente->mime }}</td>
                                                </tr>

                                                @php
                                                    $i++
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/com_compagnie/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/com_compagnie/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/com_compagnie/js/settings.js') }}"></script>
    <script src="{{ asset('assets/com_compagnie/js/gleek.js') }}"></script>
    <script src="{{ asset('assets/com_compagnie/js/styleSwitcher.js') }}"></script>

    <script src="{{ asset('assets/com_compagnie/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/com_compagnie/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        var table = $('#dataTable')
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
        $(document).ready(function() {
            $(".zero-configuration").DataTable(),
            $(".default-ordering").DataTable({
                order: [
                    [3, "desc"]
                ]
            }), $(".multi-ordering").DataTable({
                columnDefs: [{
                    targets: [0],
                    orderData: [0, 1]
                }, {
                    targets: [1],
                    orderData: [1, 0]
                }, {
                    targets: [4],
                    orderData: [4, 0]
                }]
            }), $(".complex-headers").DataTable(), $(".dom-positioning").DataTable({
                dom: '<"top"i>rt<"bottom"flp><"clear">'
            }), $(".alt-pagination").DataTable({
                pagingType: "full_numbers"
            }), $(".scroll-vertical").DataTable({
                scrollY: "200px",
                scrollCollapse: !0,
                paging: !1
            }), $(".dynamic-height").DataTable({
                scrollY: "50vh",
                scrollCollapse: !0,
                paging: !1
            }), $(".scroll-horizontal").DataTable({
                scrollX: !0
            }), $(".scroll-horizontal-vertical").DataTable({
                scrollY: 200,
                scrollX: !0
            }), $(".comma-decimal-place").DataTable({
                language: {
                    decimal: ",",
                    thousands: "."
                }
            })
        });
    </script>

</body>

</html>
