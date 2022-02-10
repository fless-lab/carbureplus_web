<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "agent_id",
        "compagnie_id",
        "station_id",
        "phone", //Ce phone a 2 usage. Dans le cas où la transaction se fait via mobile money, on l'utilise pour lancer la requête de payement
        //et ci c'est via bon , on l'utilise pour envoyer le reste du montant qu'il restera (eventuelement) une fois le payement effectué.
        "code_bon",
        "montant",
        "payment_method",
        "status" //pending, success, error
    ];

    public function compagnie(){
        $this->belongsTo(Compagnie::class);
    }

    public function station(){
        $this->belongsTo(Station::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }
}
