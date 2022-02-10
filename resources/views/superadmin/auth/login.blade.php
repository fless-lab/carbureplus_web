<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Connectez-vous !</title>
    <link href="{{asset("assets/admin/vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/admin/css/sb-admin-2.min.css")}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center align-items-center" >

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Veuillez vous connecter</h1>
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
                                    <form class="user" action="{{route('super.connexion')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username" required aria-describedby=""
                                                placeholder="Nom d'utilisateur">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" required class="form-control form-control-user"
                                                id="password" placeholder="Mot de passe">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Connexion
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="{{asset("assets/admin/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("assets/admin/vendor/jquery-easing/jquery.easing.min.js")}}"></script>
    <script src="{{asset("assets/admin/js/sb-admin-2.min.js")}}"></script>

</body>

</html>
