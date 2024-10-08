<?php

namespace App\Http\Controllers;

use App\Models\Communication_manifestation;
use Illuminate\Http\Request;

class CommunicationController extends Controller
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

        Communication_manifestation::create($formFields);

        return redirect()->back()->with('success', 'La communication a été créée avec succès!');
    }
}
