<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compteur extends Model
{
    use HasFactory;

    public function typecompteurs(){
        return $this->belongsTo(TypeCompteur::class);
    }

    public function factures(){
        return $this->hasMany(Facture::class);
    }

    public function locals(){
        return $this->belongsTo(Local::class);
    }
}
