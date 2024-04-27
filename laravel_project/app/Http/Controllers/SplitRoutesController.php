<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class SplitRoutesController extends Controller
{
    public function splitSpace()
    {
        $user = auth()->user();
        if (Enseignant::where('email', $user->email)->exists()) {

            return redirect('/dashboard-ens/view/welcome');

        } else if (Doctorant::where('email', $user->email)->exists()) {

            return redirect('/dashboard/view/welcome');

        }
    }
}
