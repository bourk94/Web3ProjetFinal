<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'nationalite',
        'photo',
        'created_at',
        'updated_at'
    ];

    public function films(){
        return $this->belongsToMany('App\Models\Film');
    }
}
