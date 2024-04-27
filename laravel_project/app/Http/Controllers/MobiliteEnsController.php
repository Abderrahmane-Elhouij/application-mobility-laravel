<?php

namespace App\Http\Controllers;

use App\Models\MobiliteEns;
use Illuminate\Http\Request;

class MobiliteEnsController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'universite_dacceuil' => 'required',
            'ville' => 'required',
            'pays' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut_sejour',
            'carte_mobilite' => 'required',
            'joindre_justicatif' => 'nullable',
            'document' => 'nullable|file',
        ]);

        $formFields['user_id'] = auth()->id();

        if ($request->hasFile('document')) {
            $formFields['document'] = $request->file('document')->store('enseignant_Documents', 'public');
        }

        MobiliteEns::create($formFields);

        return redirect()->route('logout_ens');
    }
}
