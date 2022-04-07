@extends("com_compagnie.layout.base")

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-4">
                            <img class="mr-3 rounded-circle" src="{{ asset("images/logos/".session("compagnie.logo_path")) }}" width="80" height="80" alt="">
                            <div class="media-body">
                                <h3 class="mb-0">{{ Str::ucfirst(Str::lower(session("compagnie.nom"))) }}</h3>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-primary"><i class="icon-people"></i></span>
                                    <h3 class="mb-0">{{ $n_agents }}</h3>
                                    <p class="text-muted px-4">Agents</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-warning"><i class="icon-user"></i></span>
                                    <h3 class="mb-0">{{ $n_stations }}</h3>
                                    <p class="text-muted">Stations</p>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <a href="{{ route("compagnie.deconnexion") }}" class="btn btn-danger px-5">Déconnexion</a>
                            </div>
                        </div>

                        <ul class="card-profile__info">
                            {{-- <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong>
                                <span>+228 {{ session("compagnie.phone") }}</span></li> --}}
                            <li><strong class="text-dark mr-4">Email</strong> <span>{{ session("compagnie.email") }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Mettre à jour mon profile</h4>
                        <hr width="260px">
                        <div class="basic-form">
                            <form method="POST" action="{{ route("compagnie.update") }}">
                                @csrf
                                @method("put")
                                @if (session("error"))
                                    <div class="alert alert-warning alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button> <strong>Erreur !</strong> {{ session("error") }}
                                    </div>
                                    @endif
                                @if (session("success"))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button> <strong>Félicitation !</strong> {{ session("success") }}
                                    </div>
                                    @endif
                                <div class="form-group">
                                    <input type="text" class="form-control input-default" name="nom" placeholder="Nom" value="{{ session("compagnie.nom") }}">
                                </div>
                                {{-- <div class="form-group">
                                    <input type="text" class="form-control input-default" name="phone" placeholder="Numéro" value="{{ session("compagnie.phone") }}">
                                </div> --}}
                                <div class="form-group">
                                    <input type="email" class="form-control input-flat"  name="email" placeholder="Identifiant" value="{{ session("compagnie.email") }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control input-default" name="password" placeholder="Mot de passe">
                                </div>
                                <button type="submit"  class="btn mb-1 btn-primary">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
