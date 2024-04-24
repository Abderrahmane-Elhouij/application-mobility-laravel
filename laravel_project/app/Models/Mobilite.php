<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobilite extends Model
{
    use HasFactory;

    protected $table = 'mobilites';

    protected $fillable = [
        'user_id',
        'universite_dacceuil',
        'ville',
        'pays',
        'date_debut',
        'date_fin',
        'carte_mobilite',
        'joindre_justicatif',
        'invitation'
    ];

    //public $timestamps = false;

    public function doctorant()
    {
        return $this->belongsTo(Doctorant::class, 'user_id');
    }
}
