<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Carbure + | Compagnie</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/logo-mini.png') }}">
    <link href="{{ asset('assets/com_compagnie/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">
        @include('com_compagnie.layout.navbar')
        @include('com_compagnie.layout.sidebar')
        <div class="content-body">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Station</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $n_stations }}</h2>
                                    <p class="text-white mb-0">Total de stations</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Ventes</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $n_ventes }}</h2>
                                    <p class="text-white mb-0">Total de ventes</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-9">
                            <div class="card-body">
                                <h3 class="card-title text-white">Revenu total (fcfa)</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ number_format($total,0,"."," "); }}</h2>
                                    <p class="text-white mb-0">Revenu total</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Revenu ce mois (fcfa)</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ number_format($total_month,0,"."," ") }}</h2>
                                    <p class="text-white mb-0">Revenu du mois</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ventes</h4>
                                <div id="sale-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Moyen de paiement (toutes les ventes)</h4>
                                <div id="payment-method-chart"></div>
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

    <script src="{{ asset('assets/com_compagnie/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/com_compagnie/plugins/morris/morris.min.js') }}"></script>
    <script>
        let transactions = @json($ventes_per_month);
        let months = ["Jan", "Fev", "Mar", "Avr", "Mai", "Jun", "Jui", "Aou", "Sep", "Oct", "Nov", "Dec"];
        data = [];
        for (let i = 0; i < transactions.length; i++) {
            let build = {
                m: months[i],
                v: transactions[i]
            }
            data.push(build);
        }
        console.log(data);

            Morris.Donut({
                element: 'payment-method-chart',
                data: [{
                    label: "Flooz",
                    value: {{ $flooz }},

                }, {
                    label: "T-Money",
                    value: {{ $tmoney }}
                }, {
                    label: "Bon",
                    value: {{ $bon }}
                }],
                resize: true,
                colors: ['#4d7cff', '#7571F9', '#9097c4']
            });


            Morris.Area({
                element: 'sale-chart',
                data: data,
                xkey: ['m'],
                ykeys: ['v'],
                labels: ["Ventes"],
                pointSize: 3,
                parseTime: false,
                fillOpacity: 0,
                pointStrokeColors: ['#7571F9'],
                behaveLikeLine: true,
                gridLineColor: 'transparent',
                lineWidth: 1,
                hideHover: 'auto',
                lineColors: ['#7571F9'],
                resize: true

            });





    </script>

</body>

</html>
