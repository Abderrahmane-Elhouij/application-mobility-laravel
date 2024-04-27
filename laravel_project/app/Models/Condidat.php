<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condidat extends Model
{
    use HasFactory;
    protected $table = 'condidats';
    protected $fillable = ['user_id', 'nom', 'prenom', 'structure_de_recherche', 'etablissement', 'ced', 'fd', 'email'];

    public function doctorant()
    {
        return $this->belongsTo(Doctorant::class, 'user_id');
    }
}
