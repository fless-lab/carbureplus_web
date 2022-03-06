@extends("com_compagnie.layout.base")
@section('main')
    <div class="container-fluid mt-3">
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
                            <h2 class="text-white">{{ $total }}</h2>
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
                            <h2 class="text-white">{{ $total_month }}</h2>
                            <p class="text-white mb-0">Revenu du mois</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body pb-0 d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">Ventes</h4>
                                    <p>Revenu ce mois</p>
                                    <h3 class="m-0">{{ $total_month }} fcfa</h3>
                                </div>
                                <div>
                                    <ul>
                                        <li class="d-inline-block mr-3"><a class="text-dark" href="#">Day</a></li>
                                        <li class="d-inline-block mr-3"><a class="text-dark" href="#">Week</a></li>
                                        <li class="d-inline-block"><a class="text-dark" href="#">Month</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="chart_widget_2"></canvas>
                            </div>
                            {{-- <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="w-100 mr-2">
                                    <h6>Pixel 2</h6>
                                    <div class="progress" style="height: 6px">
                                        <div class="progress-bar bg-danger" style="width: 40%"></div>
                                    </div>
                                </div>
                                <div class="ml-2 w-100">
                                    <h6>iPhone X</h6>
                                    <div class="progress" style="height: 6px">
                                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            Chart
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
