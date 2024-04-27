<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationEns extends Model
{
    use HasFactory;

    protected $table = 'publications_revues_enseignant';
    //public $timestamps = false;

    protected $fillable = [
        'user_id',
        'titre_article',
        'noms_auteurs',
        'titre_revue',
        'volume',
        'numero',
        'date_publication',
        'numero_page'
    ];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'user_id');
    }
}
