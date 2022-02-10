<!doctype html>
<html lang="en">

<head>
    <title>Compagnie</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="{{ asset('assets/compagnie/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compagnie/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compagnie/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compagnie/vendor/chartist/css/chartist-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compagnie/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compagnie/css/demo.css') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/compagnie/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/compagnie/img/favicon.png') }}">
</head>

<body>
    <div id="wrapper">
        @include("compagnie.layout.navbar")

        @include("compagnie.layout.sidebar")

        <div class="main">
            <div class="main-content">
                @yield("content")
            </div>
        </div>

        <!-- Javascript -->
        <script src="{{ asset('assets/compagnie/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/compagnie/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/compagnie/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/compagnie/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('assets/compagnie/vendor/chartist/js/chartist.min.js') }}"></script>
        <script src="{{ asset('assets/compagnie/scripts/klorofil-common.js') }}"></script>
        @yield("script")
</body>

</html>
