<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EleveActivite extends Model
{
    protected $fillable=["eleve_id" , "activite_id"];
    public function  eleves(){
        $this->belongsToMany(Eleve::class,'eleves' , 'eleve_id', 'activite_id');
    }
    public function  activites(){
        $this->belongsToMany(Activite::class,'activites' , 'eleve_id', 'activite_id');
    }
}
