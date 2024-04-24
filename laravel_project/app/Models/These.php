<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class These extends Model
{
    use HasFactory;

    protected $table = 'theses';

    protected $fillable = [
        'user_id',
        'titre',
        'nom_encadrant',
        'prenom_encadrant',
        'date_inscription',
        'description_sujet',
        'description_traveaux',
        'pertience_et_Impact'
    ];

    //public $timestamps = false;

    public function doctorant()
    {
        return $this->belongsTo(Doctorant::class, 'user_id');
    }
}
