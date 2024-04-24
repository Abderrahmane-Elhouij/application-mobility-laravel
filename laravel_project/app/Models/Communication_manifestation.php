<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication_manifestation extends Model
{
    use HasFactory;
    protected $table = 'communications_manifestations';

    protected $fillable = [
        'user_id',
        'titre',
        'intitulee',
        'lieu',
        'date'
    ];

    //public $timestamps = false;

    public function doctorant()
    {
        return $this->belongsTo(Doctorant::class, 'user_id');
    }
}
