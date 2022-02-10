<!DOCTYPE html>
<html lang="en">

<head>
    <title>⚠️ Veuillez vous authentifier ⚠️</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/main.css')}}">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset("assets/login/images/img-01.png")}}" alt="IMG">
                </div>

                <form  action="{{route('compagnie.connexion')}}" method="POST" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title">
                        Authentifiez-vous
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" name="email" required
                            placeholder="Identifiant">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" required name="password" placeholder="Mot de passe">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Se connecter
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <a class="txt2" href="#!">
                            Identifiant / Mot de passe
                        </a>
                        <span class="txt1">
                            oublié ?
                        </span>
                    </div>

                    <div class="text-center" style="padding-top:30px">
                        @if (session("error"))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Attention !</strong> {{ session("error") }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{asset('assets/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/login/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('assets/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/login/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/login/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="{{asset("assets/login/js/main.js")}}"></script>

</body>

</html>
