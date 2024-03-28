<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function locals() {
        return $this->hasMany(Local::class);
    }

    public function utilisateurs() {
        return $this->hasMany(Utilisateur::class);
    }
}
