<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobiliteEns extends Model
{
    use HasFactory;

    protected $table = 'mobilite_enseignant';

    protected $fillable = [
        'user_id',
        'universite_dacceuil',
        'ville',
        'pays',
        'date_debut',
        'date_fin',
        'carte_mobilite',
        'joindre_justicatif',
        'document'
    ];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'user_id');
    }
}
