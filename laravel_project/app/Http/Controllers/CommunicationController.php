<?php

namespace App\Http\Controllers;

use App\Models\Communication_manifestation;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'titre_communication' => 'required',
            'intitule_manifestation' => 'required',
            'lieu_manifestation' => 'required',
            'date_manifestation' => 'required|date',
        ]);

        $formFields['user_id'] = auth()->id();
        $formFields['titre'] = $formFields['titre_communication'];
        $formFields['intitulee'] = $formFields['intitule_manifestation'];
        $formFields['lieu'] = $formFields['lieu_manifestation'];
        $formFields['date'] = $formFields['date_manifestation'];
        
        Communication_manifestation::create($formFields);

        $mobiliteController = new MobiliteController();
        return $mobiliteController->store($request);
    }
}
