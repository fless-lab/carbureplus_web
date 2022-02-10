@extends("station.layout.base")

@section('main')
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Ajouter un nouvel agent.</h4>
                                    @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <i class="fa fa-check-circle"></i>&nbsp;Felicitation, {{ session('success') }}
            </div>
            @endif
                                    <form action="{{route("station.agent.store")}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Nom</strong></label>
                                            <input type="text" class="form-control" placeholder="KODJOGAN" name="nom">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Prénom</strong></label>
                                            <input type="text" class="form-control" placeholder="Ben" name="prenom">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Numero de téléphone</strong></label>
                                            <input type="phone" class="form-control" placeholder="98765432" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Mot de passe</strong></label>
                                            <input type="password" class="form-control" placeholder="********" name="password">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                                        </div>
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
