<?php

namespace App\Http\Controllers;

use App\Models\CommunicationEns;
use Illuminate\Http\Request;

class CommunicationEnsController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'titre' => 'required',
            'intitulee' => 'required',
            'lieu' => 'required',
            'date' => 'required|date',
        ]);
        $formFields['user_id'] = auth()->id();

        CommunicationEns::create($formFields);

        return redirect()->back()->with('success', 'La communication a été créée avec succès!');
    }
}
