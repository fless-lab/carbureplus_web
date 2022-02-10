<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="index.html"><img src="" alt="Carbure Plus Logo" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>{{session("compagnie.nom")}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route("compagnie.profile")}}"><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
                        <li><a href="{{route('compagnie.deconnexion')}}"><i class="lnr lnr-exit"></i> <span>Deconnexion</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
