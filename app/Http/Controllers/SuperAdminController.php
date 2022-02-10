<?php

namespace App\Http\Controllers;

use App\Models\Compagnie;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperAdminController extends Controller
{
    public function index()
    {
        $compagnies = Compagnie::all();

        return view("superadmin.index", ["compagnies" => $compagnies]);
    }

    public function getLogin()
    {
        return view("superadmin.auth.login");
    }

    public function postLogin(Request $request)
    {
        // dd($request);
        if ($this->anotherSessionRunning()) {
            return redirect()->back()->with("error", "Une session est déjà en cours, veuillez vous deconnectez puis reessayer.");
        } else {
            $superadmin = SuperAdmin::where("username", $request->username)->first();
            if (!$superadmin) {
                return redirect()->back()->with("error", "Ce compte n'existe pas.");
            } else {
                $sup = SuperAdmin::where([
                    "username" => $superadmin->username
                ])->first();

                if (Hash::check($request->password, $sup->password)) {
                    $request->session()->put("superadmin", $sup);
                    return redirect("/superadmin");
                } else {
                    return redirect()->back()->with("error", "Identifiant ou mot de passe incorrecte");
                }
            }
        }
    }

    public function superLogout()
    {
        if (session("superadmin")) {
            session()->pull('superadmin');
            return redirect()->route("super.connecter");
        }
    }

    public function storeCompagnie(Request $request)
    {
        // dd($request);
        $request->validate([
            "email" => "required|unique:compagnies|email",
            "nom" => "required",
            'logo'=>'required|mimes:jpg,png,jpeg,gif|max:5048',
            "password"=>"min:6|required_with:password_confirmation|same:password_confirmation",
        ], [
            "email.required" => "Veuillez saisir l' email.",
            "email.unique" => "Cette adresse mail a deja été utilisée.",
            "nom.required" => "Mentionnez le nom de la compagnie.",
            "password.min"=>"Le mot de passe doit faire minimum 6 caractères.",
            "password.same"=>"Les mots de passes ne correspondent pas.",
            "logo.required"=>"Veuillez fournir le logo de la compagnie"
        ]);

        if($request->logo){
            $newLogoName = "compagnie-".Str::uuid().".".$request->logo->extension();
            $request->logo->move(public_path("images/logos"),$newLogoName);
        }


        Compagnie::create([
            "nom" => $request->input("nom"),
            "email" => $request->input("email"),
            "mime" => Str::random(30),
            "password" => Hash::make($request->input("password")),
            "logo_path"=>$newLogoName??""
        ]);

        return redirect()->back()->with('success', "Compagnie ajoutée avec succès .");
    }

    public function updateCompagnie(Request $request, $mime)
    {
        $compagnie = Compagnie::where("mime", $mime)->first();
        $compagnie->update([
            "nom" => $request->nom ?? $compagnie->nom,
            "email" => $request->email??$compagnie->email,
            "password" => $request->password?Hash::make($request->password):$compagnie->password
        ]);

        return redirect()->back()->with('success', "Mise à jour effectué avec success.");
    }

    public function deleteCompagnie($mime)
    {
        $compagnie = Compagnie::where("mime", $mime)->first();
        $compagnie->delete();

        return redirect()->back()->with('success', "Compagnie supprimée avec succès.");
    }
}
