<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Etudiant extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;

    protected $table = 'etudiants';

    
}
