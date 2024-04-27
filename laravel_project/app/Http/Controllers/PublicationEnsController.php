<?php

namespace App\Http\Controllers;

use App\Models\PublicationEns;
use Illuminate\Http\Request;

class PublicationEnsController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'noms_auteurs' => 'required',
            'titre_article' => 'required',
            'titre_revue' => 'required',
            'volume' => 'required',
            'numero' => 'required',
            'date_publication' => 'required|date',
            'numero_page' => 'required',
        ]);
        $formFields['user_id'] = auth()->id();

        PublicationEns::create($formFields);

        return redirect()->back()->with('success', 'La publication a été créée avec succès!');
    }
}
