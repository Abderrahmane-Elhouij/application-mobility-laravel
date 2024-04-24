<?php

namespace App\Http\Controllers;

use App\Models\Publication_revue;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function store(Request $request)
    {
        $formFields  = $request->validate([
            'auteurs_publicationc' => 'required',
            'titre_articlec' => 'required',
            'titre_revuec' => 'required',
            'volumec' => 'required',
            'numeroc' => 'required',
            'date_publicationc' => 'required',
            'numeros_pagec' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();
        $formFields['titre_article'] = $formFields['auteurs_publicationc'];
        $formFields['noms_auteurs'] = $formFields['titre_articlec'];
        $formFields['titre_revue'] = $formFields['titre_revuec'];
        $formFields['volume'] = $formFields['volumec'];
        $formFields['numero'] = $formFields['numeroc'];
        $formFields['date_publication'] = $formFields['date_publicationc'];
        $formFields['numero_page'] = $formFields['numeros_pagec'];

        Publication_revue::create($formFields);

        $commController = new CommunicationController();
        return $commController->store($request);
    }
}
