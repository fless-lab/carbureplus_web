@extends("com_compagnie.layout.base")

@section("main")
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Agents</div>
                <div class="active-member">
                    <div class="table-responsive">
                        <table class="table table-xs mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Numéro</th>
                                    <th>Station affiliée</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1
                                @endphp
                                @forelse ($agents as $agent)

                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ Str::upper($agent->nom) }}</td>
                                    <td>
                                        <span>{{ Str::ucfirst(Str::lower($agent->prenom)) }}</span>
                                    </td>
                                    <td>
                                        +228 {{ $agent->phone }}
                                    </td>
                                    <td>
                                        {{ Str::ucfirst($station->nom) }}
                                    </td>
                                    <td>
                                        <a href="{{ route("compagnie.agent",$agent->mime) }}" type="button" class="btn mb-1 btn-outline-primary btn-sm">Consulter le profil</a>
                                    </td>
                                </tr>
                                @php
                                    $i++
                                @endphp
                                @empty
                                    Aucun agent trouvé !
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
