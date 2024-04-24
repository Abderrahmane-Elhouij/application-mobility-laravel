<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'cne' => 'required',
            'ced' => 'required',
            'fd' => 'required'
        ]);

        $email = $request->input('email');
        $prenom = $request->input('prenom');
        $nom = $request->input('nom');
        $cne = $request->input('cne');
        $ced = $request->input('ced');
        $fd = $request->input('fd');

        // Perform login logic (checking against etudiant table)
        $student = Etudiant::where([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'cne' => $cne,
            'ced' => $ced,
            'fd' => $fd,
        ])->first();

        if ($student) {
            return response()->json(['message' => 'Record exists'], 200);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }
    }
}
