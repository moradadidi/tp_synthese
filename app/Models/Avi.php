<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Avi extends Pivot
{
    /** @use HasFactory<\Database\Factories\AviFactory> */
    use HasFactory;

    protected $table = 'avis';
    
    protected $fillable = [
        'ide',
        'idf',
        'points',
    ];

    public $timestamps = false;

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class , 'ide');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'idf');
    }
}
