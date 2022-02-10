<div class="nav-header">
    <a href="index.html" class="brand-logo">
        <img class="logo-abbr" src="./images/logo.png" alt="">
        <img class="logo-compact" src="{{asset("assets/logo.png")}}" alt="">
        <img class="brand-title" src="{{asset("assets/logo.png")}}" alt="">
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>

<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <Center>{{session("station.nom")}}</Center>
                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                                <i class="icon-user"></i>
                                <span class="ml-2">Profile </span>
                            </a>
                            <hr>
                            <a href="{{route("station.deconnexion")}}" class="dropdown-item">
                                <i class="icon-key"></i>
                                <span class="ml-2">Deconnexion </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
