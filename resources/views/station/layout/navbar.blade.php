<div class="nav-header">
    <a href="{{ route("station.index") }}" class="brand-logo">
        <img class="brand-title" src="{{asset("assets/logo.png")}}" alt="Carbure +">
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
                <center>{{session("station.nom")}}</center>
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
