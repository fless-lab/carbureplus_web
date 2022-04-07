@extends("station.layout.base")
@section('main')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transactions de l'agent <td>{{ Str::upper($agent->nom) }} {{ Str::ucfirst(Str::lower($agent->prenom)) }} (+228 {{ $agent->phone }})</td></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table table-striped" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Numero client (Monnaie/Payement)</th>
                                        <th>Moyen de payement</th>
                                        <th>Montant (fcfa)</th>
                                        <th>Valeur du bon</th>
                                        <th>Monnaie retournée (fcfa)</th>
                                        <th>Date d'enregistrement</th>
                                        <th>Status de la transaction</th>
                                        <th>Date de validation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($transactions as $transaction)

                                        <tr>
                                            <td>{{ $i+1 }}</td>
                                        <td>{{$transaction->phone??"-"}}</td>
                                        <td>{{ $transaction->payment_method }}</td>
                                        <td>{{ number_format($transaction->montant,0,"."," ") }}</td>
                                        <td>{{ number_format($transaction->valeur_bon,0,"."," ")??"-"}}</td>
                                        <td>{{ number_format($transaction->monnaie_recu,0,"."," ")??"-" }}</td>
                                        <td >@php
                                            setlocale(LC_TIME, 'fr_FR');
                                            echo strftime('%d %B %G à %H:%m', strtotime($transaction->created_at));
                                        @endphp</td>
                                        <td >{{ $transaction->status }}</td>
                                        <td >@php
                                            setlocale(LC_TIME, 'fr_FR');
                                            echo strftime('%d %B %G à %H:%m', strtotime($transaction->updated_at));
                                        @endphp</td>
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

