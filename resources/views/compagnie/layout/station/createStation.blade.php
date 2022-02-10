@extends("compagnie.layout.base")

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Formulaire d'ajout d'une station</h3>
        </div>
        <form action="{{ route('compagnie.station.store') }}" method="post" class="panel-body">
            @csrf
            @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <i class="fa fa-check-circle"></i>&nbsp;Felicitation, {{ session('success') }}
            </div>
            @endif

            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            <br>
            <input type="text" class="form-control" id="siege" name="siege" placeholder="Siege">
            <br>
            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Telephone">
            <br>
            <fieldset>
                <legend>Identifiants de connexion (Très important)</legend>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input class="form-control" id="email" name="email" placeholder="Identifiant (adresse mail)" type="email">
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
            <button type="submit" class="btn btn-success">Enregister</button>
        </form>
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
