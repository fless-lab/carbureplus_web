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
        "phone",
        "valeur_bon",
        "monnaie_recu",
        "montant",
        "payment_method",
        "mime",
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
