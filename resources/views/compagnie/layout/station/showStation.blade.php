@extends("compagnie.layout.base")

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h4 class="panel-title">{{$station->nom}}</h4>
                <p class="panel-subtitle">Siege : {{$station->siege}}</p>
            </div>
            <div class="panel-body">
                <p>
                    <b>{{$station->nom}}</b> est une station de la compagnie <b>{{session("compagnie.nom")}}</b> qui fourni des services en carburant à la population environnante. La station siege à <b>{{$station->siege}}</b>. Téléphone : <b>{{$station->phone}}</b>
                </p>
                <a href="#!" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Mettre à jour la station</h3>
                    <div class="right">
                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up lnr-chevron-down"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="panel-footer">
                        <div class="panel-heading">
                            <h3 class="panel-title">Formulaire de mise à jour de la station</h3>
                        </div>
                        <form action="{{ route('compagnie.station.update',$station->mime) }}" method="post" class="panel-body">
                            @csrf
                            @method("put")
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <i class="fa fa-check-circle"></i>&nbsp;Felicitation, {{ session('success') }}
                            </div>
                            @endif

                            <input type="text" class="form-control" value="{{$station["nom"]}}" id="nom" name="nom" placeholder="Nom">
                            <br>
                            <input type="text" class="form-control" value="{{$station["siege"]}}" id="siege" name="siege" placeholder="Siege">
                            <br>
                            <input type="phone" class="form-control" value="{{$station["phone"]}}" id="phone" name="phone" placeholder="Telephone">
                            <br>
                            <fieldset>
                                <legend>Identifiants de connexion (Très important)</legend>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input class="form-control" id="email" value="{{$station["email"]}}" name="email" placeholder="Identifiant" type="email">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control" id="password" name="password" placeholder="Mot de passe" type="password">
                                    <span style="cursor: pointer" onclick="showOrHide()" class="input-group-addon"><i
                                            class="fa fa-eye"></i></span>
                                </div>
                            </fieldset>
                            <br>
                            <button type="submit" class="btn btn-success">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END PANEL DEFAULT -->
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function showOrHide() {
            elt = document.getElementById("password")
            if (elt.type === "text") {
                elt.type = "password"
            } else {
                elt.type = "text"
            }
        }
    </script>
@endsection
