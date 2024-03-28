<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCompteur extends Model
{
    use HasFactory;
    public function compteurs(){
        return $this->hasMany(Compteur::class);
    }
}
