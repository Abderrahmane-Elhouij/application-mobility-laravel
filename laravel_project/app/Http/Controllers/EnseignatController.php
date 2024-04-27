<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Notifications\SendMagicLinkNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;


class EnseignatController extends Controller
{
    use AuthenticatesUsers;
}
