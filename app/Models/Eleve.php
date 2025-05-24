<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = ["nom" , "prenom", "club_id"];

    public function club (){
        $this->belongsTo(Club::class);
    }

    public function activites (){
        $this->belongsToMany(Activite::class );
    }

}
