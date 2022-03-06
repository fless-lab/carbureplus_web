<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="{{ asset("assets/logo-mini.png") }}" type="image/x-icon">
    <title>Carbure + | Station</title>
    <link rel="stylesheet" href="{{asset("assets/station/vendor/owl-carousel/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/station/owl-carousel/css/owl.theme.default.min.css")}}">
    <link href="{{asset("assets/station/vendor/jqvmap/css/jqvmap.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/station/vendor/datatables/css/jquery.dataTables.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/station/css/style.css")}}" rel="stylesheet">



</head>

<body>
    @include("station.layout.loader")
    <div id="main-wrapper">
        @include('station.layout.navbar')
        @include('station.layout.sidebar')
        <div class="content-body">
            @yield("main")
        </div>
    </div>

    <script src="{{asset("assets/station/vendor/global/global.min.js")}}"></script>
    <script src="{{asset("assets/station/js/quixnav-init.js")}}"></script>
    <script src="{{asset("assets/station/js/custom.min.js")}}"></script>
    <script src="{{asset("assets/station/vendor/raphael/raphael.min.js")}}"></script>
    <script src="{{asset("assets/station/vendor/morris/morris.min.js")}}"></script>
    <script src="{{asset("assets/station/vendor/circle-progress/circle-progress.min.js")}}"></script>
    <script src="{{asset("assets/station/vendor/chart.js/Chart.bundle.min.js")}}"></script>
    <script src="{{asset("assets/station/vendor/gaugeJS/dist/gauge.min.js")}}"></script>
    <script src="{{asset("assets/station/vendor/flot/jquery.flot.js")}}"></script>
    <script src="{{asset("assets/station/vendor/flot/jquery.flot.resize.js")}}"></script>
    <script src="{{asset("assets/station/vendor/owl-carousel/js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("assets/station/vendor/jqvmap/js/jquery.vmap.min.js")}}"></script>
    <script src="{{asset("assets/station/vendor/jqvmap/js/jquery.vmap.usa.js")}}"></script>
    <script src="{{asset("assets/station/vendor/jquery.counterup/jquery.counterup.min.js")}}"></script>
    <script src="{{asset("assets/station/js/dashboard/dashboard-1.js")}}"></script>
    <script src="{{asset("assets/station/vendor/datatables/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("assets/station/js/plugins-init/datatables.init.js")}}"></script>
    @yield("script")

</body>

</html>
