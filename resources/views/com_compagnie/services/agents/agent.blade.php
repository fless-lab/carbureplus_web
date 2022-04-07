@extends("com_compagnie.layout.base")

@section("main")
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img alt="" class="rounded-circle mt-4" src="{{ asset("assets/com_compagnie/user.png") }}" width="130px">
                    <h4 class="card-widget__title text-dark mt-3">{{ Str::upper($agent->nom) }} {{ Str::ucfirst($agent->prenom) }}</h4>
                    <p class="text-muted">Pompiste</p>
                    <a class="btn gradient-4 btn-lg border-0 btn-rounded px-5" href="javascript:void()">Contacter</a>
                </div>
            </div>
            <div class="card-footer border-0 bg-transparent">
                <div class="row">
                    <div class=" col-12 pt-3"><a class="text-center d-block text-muted" href="mailto:{{ $station->email }}">
                        <i class="fa fa-envelope gradient-4-text"></i>
                            <p class="">Contacter la station</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-sm-12">
        <div class="card card-widget">
            <div class="card-body">
                <h5 class="text-muted">Ce mois</h5>
                <h2 class="mt-4">{{  number_format($agent["total_month"],0,"."," ") }} fcfa</h2>
                <span>Revenue Total</span>
                <div class="mt-4">
                    <h4>{{ number_format($flooz,0,"."," ") }}</h4>
                    <h6>Flooz<span class="pull-right">{{$agent["total_month"]!=0?intval(($flooz/$agent["total_month"])*100):"-" }}%</span></h6>
                    <div class="progress mb-3" style="height: 7px">
                        <div class="progress-bar gradient-1" style="width: {{$agent["total_month"]!=0?($flooz/$agent["total_month"])*100:0 }}%;" role="progressbar"><span class="sr-only">28% du total</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h4>{{  number_format($tmoney,0,"."," ") }}</h4>
                    <h6 class="m-t-10 text-muted">T-Money<span class="pull-right">{{$agent["total_month"]!=0?intval(($tmoney/$agent["total_month"])*100):"-" }}%</span></h6>
                    <div class="progress mb-3" style="height: 7px">
                        <div class="progress-bar gradient-3" style="width: {{$agent["total_month"]!=0?($tmoney/$agent["total_month"])*100:0 }}%;" role="progressbar"><span class="sr-only">65% du total</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h4>{{ number_format($bon,0,"."," ") }}</h4>
                    <h6 class="m-t-10 text-muted">Bon<span class="pull-right">{{$agent["total_month"]!=0?intval(($bon/$agent["total_month"])*100):"-" }}%</span></h6>
                    <div class="progress mb-3" style="height: 7px">
                        <div class="progress-bar gradient-4" style="width: {{$agent["total_month"]!=0?($bon/$agent["total_month"])*100:0 }}%;" role="progressbar"><span class="sr-only">12% du total</span>
                        </div>
                    </div>
                </div>
                <!-- <div class="mt-4">
                    <h4>5,250</h4>
                    <h6 class="m-t-10 text-muted">Budget Pending <span class="pull-right">70%</span></h6>
                    <div class="progress mb-3" style="height: 7px">
                        <div class="progress-bar gradient-8" style="width: 70%;" role="progressbar"><span class="sr-only">70% Complete</span>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

</div>
@endsection
