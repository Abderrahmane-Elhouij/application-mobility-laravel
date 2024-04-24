<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Doctorant extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $table = 'doctorants';
    //public $timestamps = false;

    public function condidat()
    {
        return $this->hasMany(Condidat::class, 'user_id');
    }

    public function these()
    {
        return $this->hasMany(These::class, 'user_id');
    }

    public function publication_revue()
    {
        return $this->hasMany(Publication_revue::class, 'user_id');
    }

    public function communication_manifestation()
    {
        return $this->hasMany(Communication_manifestation::class, 'user_id');
    }

    public function mobilite()
    {
        return $this->hasMany(Mobilite::class, 'user_id');
    }
}


    
