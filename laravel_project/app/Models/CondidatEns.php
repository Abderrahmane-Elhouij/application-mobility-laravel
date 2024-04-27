<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondidatEns extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'condidat_enseignant';

    protected $fillable = ['user_id', 'nom', 'prenom', 'structure_de_recherche', 'etablissement', 'email', 'telephone', 'description_traveaux', 'pertinence_impact'];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'user_id');
    }
}
