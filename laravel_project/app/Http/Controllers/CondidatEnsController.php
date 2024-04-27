<?php

namespace App\Http\Controllers;

use App\Models\CondidatEns;
use Illuminate\Http\Request;

class CondidatEnsController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'structure_de_recherche' => 'required',
            'etablissement' => 'required',
            'email' => ['required', 'email'],
            'telephone' => 'required',
            'description_traveaux' => 'required',
            'pertinence_impact' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        CondidatEns::create($formFields);

        $mobiliteController = new MobiliteEnsController();
        return $mobiliteController->store($request);
    }
}
