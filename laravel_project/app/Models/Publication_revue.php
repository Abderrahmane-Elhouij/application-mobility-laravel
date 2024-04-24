<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication_revue extends Model
{
    use HasFactory;
    protected $table = 'publications_revues';
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

    public function doctorant()
    {
        return $this->belongsTo(Doctorant::class, 'user_id');
    }
}
