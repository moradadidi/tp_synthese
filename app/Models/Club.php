<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubs';
    protected $fillable = ["nom"];
    public function eleves(){
         $this->hasMany(Eleve::class );
    }
}
