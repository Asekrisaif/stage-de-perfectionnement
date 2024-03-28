<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    public function locals() {
        return $this->belongsTo(Local::class);
    }

    public function regions(){
        return $this->belongsTo(Region::class);
    }
}
