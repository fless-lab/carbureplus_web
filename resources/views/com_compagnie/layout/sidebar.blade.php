<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Accueil</li>
            <li>
                <a href="{{ route("compagnie.index") }}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-label">Personnel</li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Stations</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route("compagnie.station.create") }}">Ajouter</a></li>
                    <li><a href="{{ route("compagnie.stations.liste") }}">Liste des stations</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Agents</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route("compagnie.agents") }}">Liste des agents</a></li>
                    {{-- <li><a href="#!">Aperçu</a></li> --}}
                    <li><a href="{{ route("compagnie.stations") }}">Agents par station</a></li>
                </ul>
            </li>
            <li class="nav-label">Comptes</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-graph menu-icon"></i> <span class="nav-text">Ventes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route("compagnie.ventes") }}">Toutes les ventes</a></li>
                    <li><a href="{{ route("compagnie.stations.bis") }}">Ventes par stations</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
