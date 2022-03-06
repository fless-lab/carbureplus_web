

<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="{{ asset("assets/logo-mini.png") }}" type="image/x-icon">
    <title>Carbure +</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("assets/logo-mini.png") }}">
    <link href="{{ asset("assets/com_compagnie/css/style.css") }}" rel="stylesheet">

</head>

<body class="h-100" style="background-color: rebeccapurple">

    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="#!"> <h4>Carbure +</h4></a>

                                <form class="mt-5 mb-5 login-input" action="{{route('compagnie.connexion')}}" method="POST">
                                    @csrf
                                    @if (session("error"))
                                    <div class="alert alert-warning alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button> <strong>Erreur !</strong> {{ session("error") }}
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Identifiant">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Se Connecter</button>
                                </form>
                                <p class="mt-5 login-form__footer">Mot de passe oublié ?<a href="mailto:achilleatarmla@gmail.com" class="text-primary">  Contactez l'assistance</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset("assets/com_compagnie/plugins/common/common.min.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/js/custom.min.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/js/settings.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/js/gleek.js") }}"></script>
    <script src="{{ asset("assets/com_compagnie/js/styleSwitcher.js") }}"></script>
        <script src="{{ asset("assets/com_compagnie/js/toastr.init.js") }}"></script>
        <script src="{{ asset("assets/com_compagnie/js/toastr.min.js") }}"></script>
    <script src="{{ asset('assets/admin/alert/sweetalert.min.js') }}"></script>

</body>
</html>





