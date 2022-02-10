@extends("station.layout.base")

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Revenu (Ce mois)</div>
                            <div class="stat-digit">(fcfa) 23000</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Revenu (Aujourd'hui)</div>
                            <div class="stat-digit">(fcfa) 7800</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Transactions (Totale)</div>
                            <div class="stat-digit"> 123</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Transaction (Effectives)</div>
                            <div class="stat-digit"> 93</div>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ventes</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-8">
                                <div id="ventes-overview-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        Morris.Bar({
        element: 'ventes-overview-chart',
        data: [{
            m: 'Jan',
            a: 100,
            b: 90
        }, {
            m: 'Fev',
            a: 75,
            b: 65
        }, {
            m: 'Avr',
            a: 50,
            b: 40
        }, {
            m: 'Mai',
            a: 75,
            b: 65
        }, {
            m: 'Jun',
            a: 50,
            b: 40
        }, {
            m: 'Jui',
            a: 75,
            b: 65
        }, {
            m: 'Aou',
            a: 100,
            b: 90
        }, {
            m: 'Sep',
            a: 48,
            b: 23
        }, {
            m: 'Oct',
            a: 120,
            b: 90
        }, {
            m: 'Nov',
            a: 70,
            b: 83
        }, {
            m: 'Dec',
            a: 23,
            b: 59
        }],
        xkey: 'm',
        ykeys: ['a', 'b'],
        labels: ['Cette Année', 'L\'an dernier'],
        barColors: ['#343957', '#5873FE'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });

    </script>
@endsection
