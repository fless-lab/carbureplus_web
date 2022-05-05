<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Carbure +" />
    <meta name="author" content="" />
    <title>Bienvenu sur carbure +</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo-mini.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/welcome/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="#!">
                <h4>Carbure +</h4>
            </a>
            <a class="btn btn-sm btn-primary" href="#nous-rejoindre">Nous Rejoindre</a>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <h1 class="mb-5">Un nouveau système pour gérer en toute transparence vos stations</h1>
                        <div class="mb-3">Avez-vous déja un compte? , continuer en tant que : </div>
                        <div class="row">
                            <div class="col-1"></div>
                            <a class="col-4 btn btn-primary" href="{{ route('station.index') }}">Station</a>
                            <div class="col-2"></div>
                            <a class="col-4 btn btn-primary" href="{{ route('compagnie.index') }}">compagnie</a>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                        <h3>Un système stable</h3>
                        <p class="lead mb-0">Un système de gestion et d'administration stable et sécurisé
                        <div class=""></div>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-key m-auto text-primary"></i></div>
                        <h3>Un système sécurisé</h3>
                        <p class="lead mb-0">Un système complètemeny digital permettant d'eviter les vols et
                            fraudes.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-star m-auto text-primary"></i></div>
                        <h3>Facilité d'utilisation</h3>
                        <p class="lead mb-0">Ce système est facile à prendre en main.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white"
                    style="background-image: url('assets/welcome/assets/img/bg-showcase-1.jpg');background-repeat:no-repeat">
                </div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Une interface pour la compagnie</h2>
                    <p class="lead mb-0">Dans le but de permettre gestion et unr administration stable et
                        transparente des differentes compagnies, un espace d'administration est proposée</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 text-white"
                    style="background-image: url('assets/welcome/assets/img/bg-showcase-2.jpg');background-repeat:no-repeat">
                </div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Une interface pour la station</h2>
                    <p class="lead mb-0">Chaque station dispose d'un espace leur permettant de gerer toutes les
                        transactions effectuées par leur agent et eventuellement, possibilité y est d'ajouter de
                        nouveaux agent.</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white"
                    style="background-image: url('assets/welcome/assets/img/bg-showcase-1.jpg');background-repeat:no-repeat">
                </div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Une application mobile pour l'agent</h2>
                    <p class="lead mb-0">Chaque agent appartenant à une station dispose d'une application mobile
                        par le biais duquel toutes les transaction seront encaissées</p>
                </div>
            </div>
        </div>
    </section>
    <section class="call-to-action text-white text-center" id="nous-rejoindre">
        <form action="{{ route("send.contact_email") }}" method="POST">
            @csrf
            <div class="container position-relative">
                <h2 class="mb-5">Remplissez le formulaire suivant pour commencer</h2>
                <div class="row">
                    <div class="col"></div>
                    <div class="col justify-content-center">
                        <div class="col">
                            <div class="row">
                                <div class="col mb-4">
                                    <input class="form-control form-control-sm" id="nom" type="text" name="nom"
                                        placeholder="Le nom de votre compagnie" required
                                        data-sb-validations="required,email" value="{{ old('nom') }}" />
                                </div>

                                <div class="col">
                                    <input class="form-control form-control-sm" id="email" type="email" name="email"
                                        placeholder="Votre adresse mail" required data-sb-validations="required,email"
                                        value="{{ old('email') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col">
                                <div class="col mb-4">
                                    <textarea name="description" id="description" required class="form-control form-control-sm"                                         placeholder="Message/Description de votre compagnie"
                                        data-sb-validations="required,email">{{ old('description') }}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

                <div class="col-auto mt-5"><button class="btn btn-primary btn-sm" id="submitButton"
                        type="submit">Envoyer</button></div>


            </div>
        </form>
    </section>
    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#!">À Propos</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Nous contacter</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Conditions et termes d'utilisation</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Carbure + 2022. Tous droits reservés.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="https://wa.me/22896858733" target="_blank"><i class="bi-whatsapp fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="https://www.linkedin.com/in/abdou-raouf-atarmla-9184301b8" target="_blank"><i
                                    class="bi-linkedin fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/fless-lab" target="_blank"><i class="bi-github fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/welcome/js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
