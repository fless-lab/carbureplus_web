<?php

namespace App\Http\Controllers;

use App\Models\Compagnie;
use App\Models\Station;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class StationController extends Controller
{
    public function index()
    {
        //Pour le graph
        /*
        $trans = Transaction::where("status","effectuee")->where("filiale_id",session("filiale.id"))->select("id","montant")
                    ->get()
                    ->groupBy(function($date){
                        return Carbon::parse($date->created_at)->format("m"); //Action_date
                    });
        $transmcount = [];

        function populate($transactions){
            $t = [];
            foreach ($transactions as $trans){
                array_push($t,$trans->montant);
            }
            return array_sum($t);
        }

        $transArr = [];

        foreach ($trans as $key => $value) {
            $transmcount[(int)$key] = populate($value);
        }

        for($i=0;$i<12;$i++){
            if(!empty($transmcount[$i+1])){
                array_push($transArr,$transmcount[$i+1]);
            }else{
                array_push($transArr,0);
            }
        }
        //####################//

        //$this_month = now()->month;
        // dd(now()->format("d/m/Y"));
        $n_trans = count(
            Transaction::where("status","effectuee")->where("filiale_id",session("filiale.id"))->get());
        //$this_month_trans =Transaction::where("status","effectuee")->where("filiale_id",session("filiale.id"))->get();
        //dd($this_month_trans);
        $n_clients = Transaction::where("status","effectuee")->where("filiale_id",session("filiale.id"))->distinct()->count("receiver_id");        // dd($n_client);
        $revenues_totales = Transaction::where("status","effectuee")->where("filiale_id",session("filiale.id"))->get();

        $ventes_totales = [];
        foreach ($revenues_totales as $vente){
            array_push($ventes_totales,$vente->montant);
        }

        //$ventes_m = Transaction::where("sender_id",$agent->id)->where("status","effectuee")->where("")->get("montant");

        // dd($transArr);
        return view("filiale.index",["revenues"=>array_sum($ventes_totales),"n_transactions"=>$n_trans,"n_clients"=>$n_clients,"tab_transacs"=>$transArr]);
        */
        return view("station.index");
    }

    public function getLogin()
    {
        return view("station.auth.login");
    }

    public function postLogin(Request $request)
    {

        if ($this->anotherSessionRunning()) {
            return redirect()->back()->with("error", "Une session est déjà en cours, veuillez vous deconnectez puis reessayer.");
        } else {
            $station = Station::where("email", $request->email)->first();

            if (!$station) {
                return redirect()->back()->with("error", "Ce compte n'existe pas.");
            } else {
                $stat = Station::where([
                    "email" => $station->email
                ])->first();

                if (Hash::check($request->password, $stat->password)) {
                    $request->session()->put("station", $stat);
                    return redirect("/station");
                } else {
                    return redirect()->back()->with("error", "Identifiant ou mot de passe incorrecte");
                }
            }
        }
    }

    public function stationLogout()
    {
        if (session("station")) {
            session()->pull('station');
            return redirect()->route("station.connecter");
        }
    }

    public function profile()
    {
        $logo = Compagnie::find(session("station.compagnie_id"))->logo_path;
        return view("station.pages.profile", ["logo" => $logo]);
    }

    public function transactions()
    {
        $transactions = Transaction::where("station_id", session("station.id"))->get();
        if ($transactions) {

            // for ($i = 0; $i < count($transactions); $i++) {
            //     $transactions[$i]["agent"] = User::find($transactions[$i]->sender_id);
            //     $transactions[$i]["client"] = User::find($transactions[$i]->receiver_id);
            //     unset($transactions[$i]["sender_id"]);
            //     unset($transactions[$i]["sender_type"]);
            //     unset($transactions[$i]["receiver_id"]);
            //     unset($transactions[$i]["receiver_type"]);
            //     unset($transactions[$i]["updated_at"]);
            // }
        }
        return view("station.pages.transactions", ["transactions" => $transactions]);
    }

    public function update(Request $request)
    {
        $station = session("station");

        $station->update([
            "nom" => $request->nom,
            "siege" => $request->siege,
            "phone" => $request->phone,
            "password" => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', "Mise à jour effectué avec success.");
    }

    public function createAgent()
    {
        return view("station.pages.addAgent");
    }

    public function storeAgent(Request $request)
    {
        // dd($request);
        User::create([
            "nom" => $request->input("nom"),
            "prenom" => $request->input("prenom"),
            "phone" => $request->input("phone"),
            "password" => Hash::make($request->input("password")),
            "mime" => Str::random(30),
            "compagnie_id" => session("station.compagnie_id"),
            "station_id" => session("station.id"),
            "photo_profile" => Compagnie::find(session("station.compagnie_id"))->logo_path,
        ]);

        return redirect()->back()->with('success', "Agent créé avec succès .");
    }

    public function listeAgents()
    {
        $agents = User::where("compagnie_id", session("station.compagnie_id"))->where("station_id", session("station.id"))->get();
        return view("station.pages.listeAgents", ["agents" => $agents]);
    }


    public function getUpdateForm($mime){
        $agent = User::where("mime",$mime)->first();
        return view("station.pages.updateAgent",["agent"=>$agent]);
    }

    public function updateAgent(Request $request, $mime)
    {
        $agent = User::where("mime", $mime)->first();
        $agent->update([
            "nom" => $request->input("nom"),
            "prenom" => $request->input("prenom"),
            "phone" => $request->input("phone"),
            "password" => Hash::make($request->input("password"))
        ]);

        return redirect()->back()->with('success', "Mise à jour effectué avec success.");
    }
}
