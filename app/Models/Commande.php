<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $primaryKey='idCommande';
    protected $fillable = ['date', 'montant', 'idClient'];

    public function client(){
        $this->hasMany(Client::class , 'idClient');
    }

    public function produits(){
        $this->belongsToMany(Produit::class)->withPivot('quantite');
    }
}
