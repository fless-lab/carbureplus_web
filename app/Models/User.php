<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "nom",
        "prenom",
        "phone",
        "password",
        "station_id",
        "compagnie_id",
        "photo_profile",
        'mime',
    ];

    protected $hidden = [
        'password',
    ];

    public function transactions(){
        $this->hasMany(Transaction::class);
    }


    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
}
