@extends("com_compagnie.layout.base")

@section("main")
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Enregistrer une nouvelle station</h4>
            <hr width="260px">
            <div class="basic-form">
                <form method="POST" action="{{ route("compagnie.station.create") }}">
                    @csrf
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
                        <input type="text" class="form-control input-default" name="nom" placeholder="Nom de la station">
                    </div>
                    <div class="form-group">
                        <input type="phone" class="form-control input-flat" name="phone" placeholder="Numéro">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-default" name="siege" placeholder="Siège">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control input-flat" name="email" placeholder="Identifiant">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-default" name="password" placeholder="Mot de passe">
                    </div>
                    <button type="submit" class="btn mb-1 btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
