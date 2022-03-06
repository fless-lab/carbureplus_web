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
        //Pour le graph ...

        $trans = Transaction::where("status", "succeed")->where("station_id", session("station.id"))->select("id", "created_at", "montant")
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format("m"); //Action_date
            });
        //dd($trans); //On recupere les données et elles sont classées par moi.
        $trans_total_by_month = [];
        $array = [];

        foreach ($trans as $key => $value) {
            $total = 0;
            for ($i = 0; $i < sizeof($value); $i++) {
                $total += $value[$i]->montant;
            }
            $array[intval($key)] = $total;
        }
        // dd($array);

        for ($i = 0; $i < 12; $i++) {
            if (!empty($array[$i + 1])) {
                array_push($trans_total_by_month, $array[$i + 1]);
            } else {
                array_push($trans_total_by_month, 0);
            }
        }


        $now = Carbon::now();
        $today = Carbon::parse($now)->format("d/m/Y");
        $this_month = Carbon::parse($now)->format("m");
        $transactions = Transaction::where("compagnie_id", session("station.compagnie_id"))->where("station_id", session("station.id"))->where("status", "succeed")->get();
        // dd($transactions);
        $montant_total_today = 0;
        $montant_total_this_month = 0;
        $transactions_this_month = 0;
        $transactions_today = 0;
        foreach ($transactions as $transaction) {
            if (Carbon::parse($transaction["created_at"])->format("d/m/Y") == $today) {
                $montant_total_today += $transaction["montant"];
                $transactions_today++;
            }
        }
        foreach ($transactions as $transaction) {
            if (Carbon::parse($transaction["created_at"])->format("m") == $this_month) {
                $montant_total_this_month += $transaction["montant"];
                $transactions_this_month++;
            }
        }


        $flooz = 0;
        $tmoney = 0;
        $bon = 0;
        $total = 0;
        $ventes = Transaction::where("compagnie_id", session("station.compagnie_id"))->where("station_id", session("station.id"))->where("status","succeed")->get();
        foreach ($ventes as $vente) {
            // if (Carbon::parse($vente["created_at"])->format("m") == $this_month) {
            $total += $vente["montant"];
            if ($vente["payment_method"] == "Flooz") {
                $flooz += $vente["montant"];
            } elseif ($vente["payment_method"] == "T-Money") {
                $tmoney += $vente["montant"];
            } else {
                $bon += $vente["montant"];
            }
            // }
        }

        // dd(["total_month"=>$montant_total_this_month,"total_today"=>$montant_total_today,"transactions_month"=>$transactions_this_month,"transactions_today"=>$transactions_today,"total_per_month"=>$trans_total_by_month]);
        return view("station.index", ["total"=>$total,"flooz"=>$flooz,"tmoney"=>$tmoney,"bon"=>$bon,"total_month" => $montant_total_this_month, "total_today" => $montant_total_today, "transactions_month" => $transactions_this_month, "transactions_today" => $transactions_today, "total_per_month" => $trans_total_by_month]);

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
        $transactions = Transaction::where("compagnie_id", session("station.compagnie_id"))->where("station_id", session("station.id"))->get();
        if ($transactions) {
            foreach ($transactions as $transaction) {
                $transaction["agent"] = User::find($transaction->agent_id);
            }
        }
        return view("station.pages.transactions", ["transactions" => $transactions]);
    }

    public function transactionsParAgent($mime)
    {
        $agent = User::where("mime", $mime)->first();
        $transactions = Transaction::where("compagnie_id", session("station.compagnie_id"))->where("station_id", session("station.id"))->where("agent_id", $agent->id)->get();
        if ($transactions) {
            foreach ($transactions as $transaction) {
                $transaction["agent"] = User::find($transaction->agent_id);
            }
        }

        return view("station.pages.transactionsParAgent", ["transactions" => $transactions, "agent" => $agent]);
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
            "mime" => Str::upper(Str::random(10)),
            "compagnie_id" => session("station.compagnie_id"),
            "station_id" => session("station.id"),
            "photo_profile" => Compagnie::find(session("station.compagnie_id"))->logo_path,
        ]);

        return redirect()->back()->with('success', "Agent créé avec succès .");
    }

    public function listeAgents()
    {
        $agents = User::where("compagnie_id", session("station.compagnie_id"))->where("station_id", session("station.id"))->get();
        foreach ($agents as $agent) {
            $now = Carbon::now();
            $this_month = Carbon::parse($now)->format("m");
            $transactions = Transaction::where("compagnie_id", $agent->compagnie_id)->where("station_id", $agent->station_id)->where("agent_id", $agent->id)->where("status", "succeed")->get();
            $montant_total = 0;
            $montant_total_this_month = 0;
            foreach ($transactions as $transaction) {
                $montant_total += $transaction["montant"];
            }
            foreach ($transactions as $transaction) {
                if (Carbon::parse($transaction["created_at"])->format("m") == $this_month) {
                    $montant_total_this_month += $transaction["montant"];
                }
            }
            $agent["total_month"] = $montant_total_this_month;
            $agent["total"] = $montant_total;
        }

        // dd($agents);

        return view("station.pages.listeAgents", ["agents" => $agents]);
    }

    public function agents()
    {
        $agents = User::where("compagnie_id", session("station.compagnie_id"))->where("station_id", session("station.id"))->get();
        return view("station.pages.agents", ["agents" => $agents]);
    }


    public function getUpdateForm($mime)
    {
        $agent = User::where("mime", $mime)->first();
        return view("station.pages.updateAgent", ["agent" => $agent]);
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
