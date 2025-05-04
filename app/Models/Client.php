<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey='idClient';
    protected $fillable = ['nom', 'email', 'telephone'];

    public function commandes(){
        $this->hasMany(Commande::class, 'idClient');
    }
}
