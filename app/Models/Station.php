<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "password",
        "phone",
        'mime',
        "email",
        "siege",
        "compagnie_id",
    ];


    protected $hidden = ["password"];


    public function compagnie(){
        $this->belongsTo(Compagnie::class);
    }

    public function transactions(){
        $this->hasMany(Transaction::class);
    }
}
