<?php

namespace App\Http\Controllers;

use App\Models\Publication_revue;
use App\Models\These;
use Illuminate\Http\Request;

class TheseController extends Controller
{
    public function store(Request $request)
    {
        $formFields  = $request->validate([
            'titre_thesec' => 'required',
            'nom_encadrantc' => 'required',
            'prenom_encadrantc' => 'required',
            'date_inscriptionc' => 'required',
            'description_sujetc' => 'required',
            'description_travauxc' => 'required',
            'pertinence_impactc' => 'required',
        ]);

        $user_id['user_id'] = auth()->id();
        
        $formFields['user_id'] = $user_id['user_id'];
        $formFields['titre'] = $formFields['titre_thesec'];
        $formFields['nom_encadrant'] = $formFields['nom_encadrantc'];
        $formFields['prenom_encadrant'] = $formFields['prenom_encadrantc'];
        $formFields['date_inscription'] = $formFields['date_inscriptionc'];
        $formFields['description_sujet'] = $formFields['description_sujetc'];
        $formFields['description_traveaux'] = $formFields['description_travauxc'];
        $formFields['pertience_et_Impact'] = $formFields['pertinence_impactc'];

        These::create($formFields);

        $mobiliteController = new MobiliteController();
        return $mobiliteController->store($request);
    }
}
