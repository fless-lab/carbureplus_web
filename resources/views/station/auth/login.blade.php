<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Connectez-vous !</title>
    <link href="{{asset("assets/station/css/style.css")}}" rel="stylesheet">

</head>

<body class="h-100" style="background-color: rgb(84, 73, 122)">
    <div class="authincation h-100">


        <div class="container-fluid h-100">
            <div class="text-center py-5">
                <h3 style="color: white">Gérez plus facilement votre station grace à « Carbure + station » !</h3>
                </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-2">CONNECTEZ-VOUS !</h4>
                                    <div class="text-center" style="padding-top:30px">
                                        @if (session("error"))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="color: white">
                                                <strong>Attention ! </strong> {{ session("error") }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <form action="{{route("station.connexion")}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Adresse mail</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="example@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Mot de passe</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="********">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Me garder connecter</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset("assets/station/vendor/global/global.min.js")}}"></script>
    <script src="{{asset("assets/station/js/quixnav-init.js")}}"></script>
    <script src="{{asset("assets/station/js/custom.min.js")}}"></script>
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('assets/admin/alert/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/admin/alert/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/admin/alert/sweetalert.min.js') }}"></script>


    {{-- @if (session('success'))

        <script>
            toastr.success("{{ session('success') }}", "Félicitation !", {
                timeOut: 5000
            });
        </script>
    @endif

    @if ($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    toastr.error("{{$error}}", "Erreur !", {timeOut: 5000});
                </script>
            @endforeach
        </h6>
    @endif --}}

</body>

</html>
