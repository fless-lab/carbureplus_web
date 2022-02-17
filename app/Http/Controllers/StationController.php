<?php

namespace App\Http\Controllers;

use App\Models\Compagnie;
use App\Models\Station;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use function PHPSTORM_META\type;

class StationController extends Controller
{
    public function index()
    {
        //Pour le graph

        $trans = Transaction::where("status","succeed")->where("station_id",session("station.id"))->select("id","created_at","montant")
                    ->get()
                    ->groupBy(function($date){
                        return Carbon::parse($date->created_at)->format("m"); //Action_date
                    });
                    //dd($trans); //On recupere les données et elles sont classées par moi.
        $trans_total_by_month = [];
        $array = [];

        foreach ($trans as $key => $value) {
            $total = 0;
            for ($i=0; $i < sizeof($value); $i++) {
                $total+=$value[$i]->montant;
            }
            $array[intval($key)]=$total;
        }
        // dd($array);

        for ($i=0; $i < 12; $i++) {
            if(!empty($array[$i+1])){
                array_push($trans_total_by_month,$array[$i+1]);
            }else{
                array_push($trans_total_by_month,0);
            }
        }


        $now = Carbon::now();
        $today = Carbon::parse($now)->format("d/m/Y");
        $this_month = Carbon::parse($now)->format("m");
        $transactions = Transaction::where("compagnie_id",session("station.compagnie_id"))->where("station_id",session("station.id"))->where("status","succeed")->get();
        // dd($transactions);
        $montant_total_today = 0;
        $montant_total_this_month = 0;
        $transactions_this_month=0;
        $transactions_today=0;
        foreach ($transactions as $transaction) {
            if(Carbon::parse($transaction["created_at"])->format("d/m/Y") == $today){
                $montant_total_today+=$transaction["montant"];
                $transactions_today++;
            }
        }
        foreach ($transactions as $transaction) {
            if(Carbon::parse($transaction["created_at"])->format("m") == $this_month){
                $montant_total_this_month+=$transaction["montant"];
                $transactions_this_month++;
            }
        }

        // dd(["total_month"=>$montant_total_this_month,"total_today"=>$montant_total_today,"transactions_month"=>$transactions_this_month,"transactions_today"=>$transactions_today,"total_per_month"=>$trans_total_by_month]);
        return view("station.index",["total_month"=>$montant_total_this_month,"total_today"=>$montant_total_today,"transactions_month"=>$transactions_this_month,"transactions_today"=>$transactions_today,"total_per_month"=>$trans_total_by_month]);

        // return view("station.index");
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
