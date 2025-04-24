<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    /** @use HasFactory<\Database\Factories\EtudiantFactory> */
    use HasFactory;

    protected $table = 'etudiants';

    protected $primaryKey = 'codeE';

    public $incrementing = true;
    protected $keyType = 'int';
    public function getRouteKeyName()
{
    return 'codeE';
}

    protected $fillable = ['codeE', 'nom', 'prenom', 'adresse', 'dateNaissance', 'idclasse'];

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'idclasse');
    }

    public function avis()
    {
        return $this->hasMany(Avi::class);
    }

    public function formations()
{
    return $this->belongsToMany(Formation::class, 'avis', 'ide', 'idf')
                ->withPivot('points')
                ->withTimestamps();
}

}
