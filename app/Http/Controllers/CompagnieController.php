<?php

namespace App\Http\Controllers;

use App\Models\Compagnie;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CompagnieController extends Controller
{
    public function index()
    {
        return view("compagnie.index");
    }

    public function getLogin()
    {
        return view("compagnie.auth.login");
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
        return view("compagnie.profile");
    }

    public function statistiques()
    {
        return view("compagnie.statistiques");
    }

    public function update(Request $request)
    {
        $compagnie = session("compagnie");

        $compagnie->update([
            "nom" => $request->nom,
            "email" => $request->email,
            "phone" => $request->phone,
            "password" => Hash::make($request->password),
            //AJouter la mise à jour du logo
        ]);

        return redirect()->back()->with('success', "Mise à jour effectué avec success.");
    }


    public function createStation()
    {
        return view("compagnie.layout.station.createStation");
    }

    public function storeStation(Request $request)
    {

        Station::create([
            "nom" => $request->input("nom"),
            "siege" => $request->input("siege"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
            "mime" => Str::random(30),
            "password" => Hash::make($request->input("password")),
            "compagnie_id" => session("compagnie.id"),
        ]);

        return redirect()->back()->with('success', "Station ajoutée avec succès .");
    }

    public function listeStations()
    {
        $stations = Station::where("compagnie_id", session("compagnie.id"))->get();
        return view("compagnie.layout.station.index", ["stations" => $stations]);
    }

    public function afficherStation($mime)
    {
        $station = Station::where("mime", $mime)->first();
        return view("compagnie.layout.station.showStation", ["station" => $station]);
    }

    public function updateStation(Request $request, $mime)
    {
        $station = Station::where("mime", $mime)->first();
        // dd($request);
        $station->update([
            "nom" => $request->nom,
            "siege" => $request->siege,
            "email" => $request->siege,
            "phone" => $request->phone,
            "password" => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', "Mise à jour effectué avec success.");
    }

}
