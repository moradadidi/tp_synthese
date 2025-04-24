<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    /** @use HasFactory<\Database\Factories\FormationFactory> */
    use HasFactory;
    protected $table = 'formations';
    protected $primaryKey = 'idf';
    protected $fillable = [
        'idf',
        'titre',
        'nbreHeure',
    ];
    public function getRouteKeyName()
    {
        return 'idf';
    }
    public function classes()
    {
        return $this->hasMany(Classe::class, 'idformation', 'idf');
    }
    

public function avis()
{
    return $this->hasMany(Avi::class, 'formation_id', 'idf');
}


public function etudiants()
{
    return $this->belongsToMany(Etudiant::class, 'avis', 'idf', 'ide')
                ->withPivot('points')
                ->withTimestamps();
}

}
