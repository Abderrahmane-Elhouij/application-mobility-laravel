<?php

namespace App\Http\Controllers;

use App\Models\Mobilite;
use Illuminate\Http\Request;

class MobiliteController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'universite_accueil' => 'required',
            'ville_accueil' => 'required',
            'pays_accueil' => 'required',
            'date_debut_sejour' => 'required|date',
            'date_fin_sejour' => 'required|date|after_or_equal:date_debut_sejour',
            'cadre_mob' => 'required',
            'justificatif' => 'nullable',
            'invitation' => 'nullable|file',
        ]);

        $formFields['user_id'] = auth()->id();
        $formFields['universite_dacceuil'] = $formFields['universite_accueil'];
        $formFields['ville'] = $formFields['ville_accueil'];
        $formFields['pays'] = $formFields['pays_accueil'];
        $formFields['date_debut'] = $formFields['date_debut_sejour'];
        $formFields['date_fin'] = $formFields['date_fin_sejour'];
        $formFields['carte_mobilite'] = $formFields['cadre_mob'];
        $formFields['joindre_justicatif'] = $formFields['justificatif'];

        if ($request->hasFile('invitation')) {
            $formFields['invitation'] = $request->file('invitation')->store('Documents', 'public');
        }

        Mobilite::create($formFields);

        return redirect()->route('logout_form');
    }
}
