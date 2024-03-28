<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    public function compteurs() {
        return $this->hasMany(Compteur::class);
    }

    public function familles() {
        return $this->belongsTo(Famille::class);
    }

    public function utilisateurs() {
        return $this->hasMany(Utilisateur::class);
    }

    public function regions() {
        return $this->belongsTo(Region::class);
    }
}
