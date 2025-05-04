<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
    protected $fillable = ['idCommande', 'idProduit', 'quantite'];

    public function commande(){
        $this->belongsTo(Commande::class , 'idCommande');
    }

    public function produits(){
        $this->belongsToMany(Produit::class);
    }
}
