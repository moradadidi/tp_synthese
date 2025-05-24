<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = ["description", "dateDebut", "nombreJours"];

    public function eleves(){
        $this->belongsToMany(Eleve::class);
    }
}
