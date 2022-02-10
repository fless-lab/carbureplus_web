station<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/compagnie" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Stations</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{route('compagnie.station.create')}}" class="">Ajouter une station</a></li>
                            <li><a href="{{route("compagnie.stations.liste")}}" class="">Voir nos stations</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{route('compagnie.statistiques')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Statistiques</span></a></li>
            </ul>
        </nav>
    </div>
</div>
