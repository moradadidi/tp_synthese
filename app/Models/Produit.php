<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $primaryKey='idProduit';
    protected $fillable = ['nom', 'prix'];

    public function commandes(){
        $this->belongsToMany(Commande::class)->withPivot('quantite');
    }
}
