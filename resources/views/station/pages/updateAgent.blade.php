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
                                    <h4 class="text-center mb-4">Mettre à jour l'agent.</h4>
                                    <form action="{{route("station.agent.update",$agent->mime)}}" method="POST">
                                        @csrf
                                        @method("put")
                                        <div class="form-group">
                                            <label><strong>Nom</strong></label>
                                            <input type="text" class="form-control" placeholder="KODJOGAN" name="nom" value="{{$agent->nom}}">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Prénom</strong></label>
                                            <input type="text" class="form-control" placeholder="Ben" name="prenom" value="{{$agent->prenom}}">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Numero de téléphone</strong></label>
                                            <input type="phone" class="form-control" placeholder="98765432" name="phone" value="{{$agent->phone}}">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Mot de passe</strong></label>
                                            <input type="password" class="form-control" placeholder="********" name="password">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
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
