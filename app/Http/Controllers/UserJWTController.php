<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UserJWTController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|min:3',
            'prenom' => 'required|string|min:3',
            'phone' => 'required|min:3|unique:users|numeric',
            'password' => 'required|string|min:4|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user_data = $validator->validate();


        $user = User::create(array_merge(
            $user_data,
            [
                "photo_profile" => "default.png",
                "station_id"=>1,
                "compagnie_id"=>1,
                "password" => bcrypt($request->password),
                "mime" => Str::random(30)
            ]
        ));


        return response()->json([
            "success" => true,
            "message" => "Utilisateur créé avec succès",
            "user" => $user
        ], 201);
    }

    public function login()
    {
        $credentials = request(['phone', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['success' => false, 'error' => 'Unauthorized', "message" => "Identifiant ou mot de passe incorrect."], 401);
        }


        return $this->respondWithToken($token);
    }

    public function profile()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['success' => true, 'message' => 'Déconnecté avec succès.']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            "success" => true,
            "user" => auth()->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() //Validité du token 10 ans 🤣
        ]);
    }



    //Transaction...
    public function transact_via_mobilemoney(Request $request){
        $agent = auth()->user();
        $phone = $request->phone;
        $compagnie_id = $agent->compagnie_id;
        $station_id = $agent->station_id;
        $montant = $request->montant;
        $moyen = $request->payment_method;
        $status = "pending";

        $transaction = Transaction::create([
            "agent_id"=>$agent->id,
            "compagnie_id"=>$compagnie_id,
            "station_id"=>$station_id,
            "phone"=>$phone,
            "montant"=>$montant,
            "payment_method"=>$moyen,
            "status"=>$status,
        ]);

        return response()->json([
            "success"=>true,
            //Completer apres avec les autres détails...
        ]);
    }
    public function transact_via_bon(Request $request){
        /*
            Via un bon d'essence , la transaction est directe. L'agent check au prealable (physiquement) la validité du bon
            et procede à la vente. Dès qu'on insert le code , la transaction est confirmée contrairement au payement mobile où il faille attendre une confirmation au niveau du client
        */
        $agent = auth()->user();
        $code = $request->code;
        //$phone = $request->phone;
        $compagnie_id = $agent->compagnie_id;
        $station_id = $agent->station_id;
        $montant = $request->montant;
        $moyen = "Bon";
        $status = "success";

        $transaction = Transaction::create([
            "agent_id"=>$agent->id,
            "compagnie_id"=>$compagnie_id,
            "station_id"=>$station_id,
            "code_bon"=>$code,
            //"phone"=>$phone,
            "montant"=>$montant,
            "payment_method"=>$moyen,
            "status"=>$status,
        ]);


        return response()->json([
            "success"=>true,
        ]);
    }

    public function getTransactions(){
        $agent=auth()->user();
        $transactions = Transaction::where("compagnie_id",$agent->compagnie_id)->where("station_id",$agent->station_id)->where("agent_id",$agent->id)->orderBy("created_at","DESC")->get();
        foreach ($transactions as $transaction) {
            $transaction["action_date"]=Carbon::parse($transaction["created_at"])->format("d/m/Y à h:i");
        }

        return response()->json([
            "success"=>true,
            "transactions"=>$transactions,
            // "total_today"=>$total_today
        ]);
    }

    public function getTodaysSale(){
        $today = Carbon::now();
        $today = Carbon::parse($today)->format("d/m/Y");

        $agent=auth()->user();
        $transactions = Transaction::where("compagnie_id",$agent->compagnie_id)->where("station_id",$agent->station_id)->where("agent_id",$agent->id)->where("status","success")->get();

        $montant_total = 0;
        foreach ($transactions as $transaction) {
            if(Carbon::parse($transaction["created_at"])->format("d/m/Y") == $today){
                $montant_total+=$transaction["montant"];
            }
        }
        return response()->json([
            "success"=>true,
            "total"=>$montant_total,
        ]);
    }
}
