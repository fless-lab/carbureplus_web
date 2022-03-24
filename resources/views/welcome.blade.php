<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bienvenu sur carbure +</title>
        <link rel="icon" type="image/x-icon" href="{{ asset("assets/logo-mini.png") }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset("assets/welcome/css/styles.css") }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="#!"><h4>Carbure +</h4></a>
                <a class="btn btn-primary" href="#signup">Nous Rejoindre</a>
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
                                    <a class="col-4 btn btn-primary" href="{{ route("station.index") }}">Station</a>
                                    <div class="col-2"></div>
                                    <a class="col-4 btn btn-primary" href="{{ route("compagnie.index") }}">compagnie</a>
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
                            <h3>Fully Responsive</h3>
                            <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
                            <h3>Bootstrap 5 Ready</h3>
                            <p class="lead mb-0">Featuring the latest build of the new Bootstrap 5 framework!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
                            <h3>Easy to Use</h3>
                            <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-1.jpg')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Fully Responsive Design</h2>
                        <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-2.jpg')"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>Updated For Bootstrap 5</h2>
                        <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 5 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 5!</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-3.jpg')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Easy to Use & Customize</h2>
                        <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="call-to-action text-white text-center" id="signup">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="mb-4">Contactez-nous par mail pour une assistance personnalisée</h2>
                            <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-lg" id="emailAddressBelow" type="email" placeholder="Adresse mail" data-sb-validations="required,email" />
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-lg" id="emailAddressBelow" type="email" placeholder="Message" data-sb-validations="required,email" />
                                </div>
                                <div class="col-auto"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Envoyer</button></div>
                            </div>
                    </div>
                </div>
            </div>
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
                                <a href="https://www.linkedin.com/in/abdou-raouf-atarmla-9184301b8" target="_blank"><i class="bi-linkedin fs-3"></i></a>
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
        <script src="{{ asset("assets/welcome/js/scripts.js") }}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
