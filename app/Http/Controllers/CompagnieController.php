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


class CompagnieController extends Controller
{
    public function index()
    {
        $stations = Station::where("compagnie_id", session("compagnie.id"))->get();
        $ventes = Transaction::where("compagnie_id", session("compagnie.id"))->where("status","succeed")->get();
        $n_vente = count($ventes);
        $n_station = count($stations);
        $now = Carbon::now();
        $this_month = Carbon::parse($now)->format("m");
        $total = 0;
        $total_month = 0;
        foreach ($ventes as $vente) {
            $total += intval($vente->montant);
        }

        foreach ($ventes as $vente) {
            if (Carbon::parse($vente["created_at"])->format("m") == $this_month) {
                $total_month += $vente["montant"];
            }
        }
        return view("com_compagnie.index", ["n_stations" => $n_station, "n_ventes" => $n_vente, "total" => $total, "total_month" => $total_month]);
    }

    public function getLogin()
    {
        return view("com_compagnie.auth.login");
    }

    public function postLogin(Request $request)
    {
        if ($this->anotherSessionRunning()) {
            return redirect()->back()->with("error", "Une session est déjà en cours, veuillez vous deconnectez puis reessayer.");
        } else {
            $compagnie = Compagnie::where("email", $request->email)->first();

            if (!$compagnie) {
                return redirect()->back()->with("error", "Ce compte n'existe pas.");
            } else {
                $comp = Compagnie::where([
                    "email" => $compagnie->email
                ])->first();

                if (Hash::check($request->password, $comp->password)) {
                    $request->session()->put("compagnie", $comp);
                    return redirect("/compagnie");
                } else {
                    return redirect()->back()->with("error", "Identifiant ou mot de passe incorrecte");
                }
            }
        }
    }

    public function compagnieLogout()
    {
        if (session("compagnie")) {
            session()->pull('compagnie');
            return redirect()->route("compagnie.connecter");
        }
    }

    public function profile()
    {
        $stations = Station::where("compagnie_id", session("compagnie.id"))->get();
        $n_station = count($stations);
        $n_agents = 0;
        foreach ($stations as $station) {
            $n_agents += count(User::where("station_id", $station->id)->get());
        }
        return view("com_compagnie.profile", ["n_stations" => $n_station, "n_agents" => $n_agents]);
    }

    public function statistiques()
    {
        return view("compagnie.statistiques");
    }

    public function update(Request $request)
    {
        $compagnie = session("compagnie");
        // dd($request);
        $compagnie->update([
            "nom" => $request->nom ?? $compagnie->nom,
            "email" => $request->email ?? $compagnie->email,
            "phone" => $request->phone ?? $compagnie->phone,
            "password" => Hash::make($request->password) ?? $compagnie->password,
            //AJouter la mise à jour du logo
        ]);

        return redirect()->back()->with('success', "Mise à jour effectué avec success.");
    }


    public function createStation()
    {
        return view("com_compagnie.services.stations.add");
    }

    public function storeStation(Request $request)
    {

        Station::create([
            "nom" => $request->input("nom"),
            "siege" => $request->input("siege"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
            "phone_vente" => $request->input("phone"),
            "mime" => Str::upper(Str::random(10)),
            "password" => Hash::make($request->input("password")),
            "compagnie_id" => session("compagnie.id"),
        ]);

        return redirect()->back()->with('success', "Station ajoutée avec succès .");
    }

    public function listeStations()
    {
        $stations = Station::where("compagnie_id", session("compagnie.id"))->get();
        $now = Carbon::now();
        $this_month = Carbon::parse($now)->format("m");

        foreach ($stations as $station) {
            $total = 0;
            $total_month = 0;
            $n_agents = count(User::where("station_id", $station->id)->get());
            $ventes = Transaction::where("compagnie_id", session("compagnie.id"))->where("station_id", $station->id)->where("status","succeed")->get();
            foreach ($ventes as $vente) {
                $total += intval($vente->montant);
            }
            foreach ($ventes as $vente) {
                if (Carbon::parse($vente["created_at"])->format("m") == $this_month) {
                    $total_month += $vente["montant"];
                }
            }
            $station["n_agents"]=$n_agents;
            $station["ventes_totales"] = $total;
            $station["ventes_ce_mois"] = $total_month;
        }
        return view("com_compagnie.services.stations.stations", ["stations" => $stations]);
    }

    public function afficherStation($mime)
    {
        $station = Station::where("mime", $mime)->first();
        $now = Carbon::now();
        $this_month = Carbon::parse($now)->format("m");
        $total_month = 0;
        $flooz = 0;
        $tmoney = 0;
        $bon = 0;
        $ventes = Transaction::where("compagnie_id", session("compagnie.id"))->where("station_id", $station->id)->where("status","succeed")->get();
        foreach ($ventes as $vente) {
            if (Carbon::parse($vente["created_at"])->format("m") == $this_month) {
                $total_month += $vente["montant"];
                if($vente["payment_method"] == "Flooz"){
                    $flooz+=$vente["montant"];
                }elseif ($vente["payment_method"] == "T-Money") {
                    $tmoney+=$vente["montant"];
                }else{
                    $bon+=$vente["montant"];
                }
            }
        }
        $station["total_month"] = $total_month;
        return view("com_compagnie.services.stations.station", ["station" => $station,"bon"=>$bon,"flooz"=>$flooz,"tmoney"=>$tmoney]);
    }

    public function editStation($mime)
    {
        $station = Station::where("mime", $mime)->first();
        return view("com_compagnie.services.stations.update", ["station" => $station]);
    }

    public function updateStation(Request $request, $mime)
    {
        $station = Station::where("mime", $mime)->first();
        // dd($request);
        $station->update([
            "nom" => $request->nom ?? $station->nom,
            "siege" => $request->siege ?? $station->siege,
            "email" => $request->email ?? $station->email,
            "phone" => $request->phone ?? $station->phone,
            "password" => Hash::make($request->password) ?? $station->password
        ]);

        return redirect()->back()->with('success', "Mise à jour effectué avec success.");
    }

    public function deleteStation($mime)
    {
        $station = Station::where("mime", $mime)->first();
        $station->delete();

        return redirect()->route("compagnie.stations.liste")->with("success", "La station a été supprimée avec success !");
    }

    ######### List des agents par stations ##########
    public function get_stations()
    {
        $stations = Station::where("compagnie_id", session("compagnie.id"))->get();
        foreach ($stations as $station) {
            $station["agents"] = User::where("compagnie_id", session("compagnie.id"))->where("station_id", $station->id)->get();
        }
        return view("com_compagnie.services.agents.agents_per_stations", ["stations" => $stations]);
    }

    public function get_agents_by_station($mime)
    {
        $station = Station::where("mime", $mime)->first();
        $agents = User::where("compagnie_id", session("compagnie.id"))->where("station_id", $station->id)->get();
        return view("com_compagnie.services.agents.agent_per_stations_agents", [
            "agents" => $agents, "station" => $station
        ]);
    }

    public function get_all_agents()
    {
        $agents = User::where("compagnie_id", session("compagnie.id"))->get();
        $stations = Station::all();
        return view("com_compagnie.services.agents.agents", ["agents" => $agents, "stations" => $stations]);
    }

    public function get_agent($mime)
    {
        $agent = User::where("mime", $mime)->first();
        $station = Station::find($agent->station_id);
        $now = Carbon::now();
        $this_month = Carbon::parse($now)->format("m");
        $total_month = 0;
        $flooz = 0;
        $tmoney = 0;
        $bon = 0;
        $ventes = Transaction::where("compagnie_id", session("compagnie.id"))->where("station_id", $station->id)->where("agent_id",$agent->id)->where("status","succeed")->get();
        foreach ($ventes as $vente) {
            if (Carbon::parse($vente["created_at"])->format("m") == $this_month) {
                $total_month += $vente["montant"];
                if($vente["payment_method"] == "Flooz"){
                    $flooz+=$vente["montant"];
                }elseif ($vente["payment_method"] == "T-Money") {
                    $tmoney+=$vente["montant"];
                }else{
                    $bon+=$vente["montant"];
                }
            }
        }
        $agent["total_month"] = $total_month;
        return view("com_compagnie.services.agents.agent", ["agent" => $agent, "station" => $station,"bon"=>$bon,"flooz"=>$flooz,"tmoney"=>$tmoney]);
    }


    public function get_stations_bis()
    {
        $stations = Station::where("compagnie_id", session("compagnie.id"))->get();
        return view("com_compagnie.services.ventes.ventes_per_station", ["stations" => $stations]);
    }

    public function get_ventes_by_station($mime)
    {
        $station = Station::where("mime", $mime)->first();
        $ventes = Transaction::where("compagnie_id", session("compagnie.id"))->where("station_id", $station->id)->get();
        foreach ($ventes as $vente) {
            $vente["agent"]=User::find($vente->agent_id);
            $vente["station"]=Station::find($vente->station_id);
        }
        return view("com_compagnie.services.ventes.ventes_per_station_ventes", ["ventes" => $ventes, "station" => $station]);
    }

    public function get_all_ventes()
    {
        $ventes = Transaction::where("compagnie_id", session("compagnie.id"))->get();
        foreach ($ventes as $vente) {
            $vente["agent"]=User::find($vente->agent_id);
            $vente["station"]=Station::find($vente->station_id);
        }
        return view("com_compagnie.services.ventes.ventes", ["ventes" => $ventes]);
    }
}
