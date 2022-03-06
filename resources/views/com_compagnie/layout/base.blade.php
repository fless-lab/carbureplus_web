<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Carbure +</title>
    <link rel="shortcut icon" href="{{ asset("assets/logo-mini.png") }}" type="image/x-icon">
    <!-- Pignose Calender -->
    <link href="{{ asset("assets/com_compagnie/plugins/pg-calendar/css/pignose.calendar.min.css") }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset("assets/com_compagnie/plugins/chartist/css/chartist.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/com_compagnie/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css") }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset("assets/com_compagnie/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/com_compagnie/plugins/tables/css/datatable/dataTables.bootstrap4.min.css") }}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
       @include("com_compagnie.layout.navbar")
        @include("com_compagnie.layout.sidebar")
        <div class="content-body">
            <div class="container-fluid mt-3" style="min-height: 895px">
                @yield("main")

            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset("assets/com_compagnie/plugins/common/common.min.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/js/custom.min.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/js/settings.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/js/gleek.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/js/styleSwitcher.js") }}"></script>

    <!-- Chartjs -->
    <script src="{{ asset("assets/com_compagnie/plugins/chart.js/Chart.bundle.min.js") }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset("assets/com_compagnie/plugins/circle-progress/circle-progress.min.js") }}"></script>
    <!-- Datamap -->
    {{-- <script src="{{ asset("assets/com_compagnie/plugins/d3v3/index.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/plugins/topojson/topojson.min.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/plugins/datamaps/datamaps.world.min.js") }}"></script> --}}
    <!-- Morrisjs -->
    <script src="{{ asset("assets/com_compagnie/plugins/raphael/raphael.min.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/plugins/morris/morris.min.js") }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset("assets/com_compagnie/plugins/moment/moment.min.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/plugins/pg-calendar/js/pignose.calendar.min.js") }}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset("assets/com_compagnie/plugins/chartist/js/chartist.min.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js") }}"></script>



    <script src="{{ asset("assets/com_compagnie/js/dashboard/dashboard-1.js") }}"></script>

    {{-- datatable --}}
    <script src="{{ asset("assets/com_compagnie/plugins/tables/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/plugins/tables/js/datatable/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/plugins/tables/js/datatable-init/datatable-basic.min.js") }}"></script>
    @yield("script")
</body>

</html>
