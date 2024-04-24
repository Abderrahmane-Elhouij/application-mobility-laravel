<?php

namespace App\Http\Controllers;

use App\Models\Condidat;
use Illuminate\Http\Request;

class CondidatController extends Controller
{
    public function store(Request $request)
    {
        $formFields  = $request->validate([
            'nomc' => 'required',
            'prenomc' => 'required',
            'structurec' => 'required',
            'etablissementc' => 'required',
            'cedc' => 'required',
            'formationc' => 'required',
            'emailc' => ['required', 'email'],
        ]);

        $formFields['user_id'] = auth()->id();
        $formFields['nom'] = $formFields['nomc'];
        $formFields['prenom'] = $formFields['prenomc'];
        $formFields['structure_de_recherche'] = $formFields['structurec'];
        $formFields['etablissement'] = $formFields['etablissementc'];
        $formFields['ced'] = $formFields['cedc'];
        $formFields['fd'] = $formFields['formationc'];
        $formFields['email'] = $formFields['emailc'];

        Condidat::create($formFields);

        $theseController = new TheseController();
        return $theseController->store($request);
    }
}
