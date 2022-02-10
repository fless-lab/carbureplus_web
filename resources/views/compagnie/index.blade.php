@extends("compagnie.layout.base")

@section('content')
<div class="container-fluid">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Vue d'ensemble mensuelle</h3>
            <p class="panel-subtitle">Periode: 23 Nov 2021 - 23 Dec 2021</p>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-download"></i></span>
                        <p>
                            <span class="number">1,252</span>
                            <span class="title">Clients</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                        <p>
                            <span class="number">2039</span>
                            <span class="title">Ventes</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-eye"></i></span>
                        <p>
                            <span class="number">39</span>
                            <span class="title">Stations</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-bar-chart"></i></span>
                        <p>
                            <span class="number">2 098 785</span>
                            <span class="title">Gains (FCFA)</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div id="headline-chart" class="ct-chart"></div>
                </div>
                <div class="col-md-3">
                    <div class="weekly-summary text-right">
                        <span class="number">2039</span> <span class="percentage"><i
                                class="fa fa-caret-up text-success"></i> 12%</span>
                        <span class="info-label">Ventes</span>
                    </div>
                    <div class="weekly-summary text-right">
                        <span class="number">989</span> <span class="percentage"><i
                                class="fa fa-caret-up text-success"></i> 23%</span>
                        <span class="info-label">Clients (Ce mois)</span>
                    </div>
                    <div class="weekly-summary text-right">
                        <span class="number">2 098 785</span> <span class="percentage"><i
                                class="fa fa-caret-down text-danger"></i> 8%</span>
                        <span class="info-label">Revenu (Ce mois/FCFA)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        var data, options;

        // headline charts
        data = {
            labels: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jui', "Aou", "Sep", "Oct", "Nov", "Dec"],
            series: [{
                    name: "Ce mois",
                    data: [23, 29, 24, 40, 25, 24, 35, 23, 29, 24, 40, 25]
                },
                {
                    name: "Le mois dernier",
                    data: [14, 25, 18, 34, 29, 38, 44, 87, 90, 101, 9, 19]
                },
            ]
        };

        options = {
            height: 300,
            showArea: false,
            showLine: true,
            showPoint: true,
            fullWidth: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: true,
        };

        new Chartist.Line('#headline-chart', data, options);


    });
</script>
@endsection
