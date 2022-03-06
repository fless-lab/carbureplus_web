<div class="nav-header">
    <div class="brand-logo">
        <a href="{{ route("compagnie.index") }}">
            <b class="logo-abbr"><img src="{{ asset("assets/logo-mini.png") }}" alt=""> </b>
            <span class="logo-compact"><img src="{{ asset("assets/logo-mini.png") }}" alt=""></span>
            <span class="brand-title">
                <img src="{{ asset("assets/logo.png") }}" width="150px" alt="">
            </span>
        </a>
    </div>
</div>
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1">{{ Str::upper(session("compagnie.nom")) }}</span>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{ asset("assets/com_compagnie/user.png") }}" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{ route("compagnie.profile") }}"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>

                                <hr class="my-2">
                                <li><a href="{{ route("compagnie.deconnexion") }}"><i class="icon-key"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
