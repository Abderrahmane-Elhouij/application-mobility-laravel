<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Enseignant extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'enseignant';
    //public $timestamps = false;

    public function condidat()
    {
        return $this->hasMany(CondidatEns::class, 'user_id');
    }

    public function publication()
    {
        return $this->hasMany(PublicationEns::class, 'user_id');
    }

    public function communication()
    {
        return $this->hasMany(CommunicationEns::class, 'user_id');
    }

    public function mobilite()
    {
        return $this->hasMany(MobiliteEns::class, 'user_id');
    }
}
