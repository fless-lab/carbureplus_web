<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compagnie extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        'mime',
        "email",
        "password",
        "logo_path"
    ];

    protected $hidden = ["password"];

    public function stations()
    {
        $this->hasMany(Station::class);
    }



}
