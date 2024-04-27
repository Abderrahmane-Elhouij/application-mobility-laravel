<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicationEns extends Model
{
    use HasFactory;

    protected $table = 'communications_manifestations_enseignant';

    protected $fillable = [
        'user_id',
        'titre',
        'intitulee',
        'lieu',
        'date'
    ];

    //public $timestamps = false;

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'user_id');
    }
}
