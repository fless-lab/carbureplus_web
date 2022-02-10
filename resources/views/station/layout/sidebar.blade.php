<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Carbure +</li>
            <li><a href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>

            </li>
            <li class="nav-label">Autres</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Agents</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route("station.agent.create")}}">Ajouter</a></li>
                    <li><a  href="{{route("station.agents.liste")}}" aria-expanded="false">Liste des agents</a>

                    </li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-chart-bar-33"></i><span class="nav-text">Transactions</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route("station.transactions")}}">Nos transactions</a></li>
                </ul>
            </li>
        </ul>
    </div>


</div>
