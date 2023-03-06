<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'realisateur',
        'genre',
        'duree',
        'annee_sortie',
        'synopsis',
        'image',
        'trailer',
        'created_at',
        'updated_at'
    ];

    public function acteurs(){
        return $this->belongsToMany('App\Models\Acteur');
    }
}
