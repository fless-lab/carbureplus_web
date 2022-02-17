@extends("station.layout.base")

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Revenu (Ce mois)</div>
                            <div class="stat-digit">(fcfa) {{ $total_month }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Revenu (Aujourd'hui)</div>
                            <div class="stat-digit">(fcfa) {{ $total_today }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Transactions (Ce mois)</div>
                            <div class="stat-digit"> {{ $transactions_month }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Transactions (Aujourd'hui)</div>
                            <div class="stat-digit"> {{ $transactions_today }}</div>
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
        let transactions = @json($total_per_month); //Ce mois..
        let transactions_last_year = [1560,2655,8520,10025,3200,3095,6780,1200,4575,9000,12000,7930] //Fake data
        let months = ["Jan","Fev","Mar","Avr","Mai","Jun","Jui","Aou","Sep","Oct","Nov","Dec"];
        data = [];
        for (let i = 0; i < transactions.length; i++) {
            let build = {
                m: months[i],
                a: transactions[i],
                b: transactions_last_year[i]
            }
            data.push(build);
        }
        //console.log(data);
        Morris.Bar({
        element: 'ventes-overview-chart',
        data: data,
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
