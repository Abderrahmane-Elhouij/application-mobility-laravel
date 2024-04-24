<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackGoogle()
    {

        $user = Socialite::driver('google')->stateless()->user();
        $email = $user->getEmail();

        return redirect()->route('login', ['email' => $email,]);
    }

    public function login(Request $request)
    {
        try {

            $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'email' => ['required', 'email', Rule::unique('etudiants', 'email')],
                'cne' => 'required',
                'ced' => 'required',
                'fd' => 'required'
            ]);

            $nom = $request->input('nom');
            $prenom = $request->input('prenom');
            $email = $request->input('email');
            $cne = $request->input('cne');
            $ced = $request->input('ced');
            $fd = $request->input('fd');

            $user = Etudiant::where([
                ['nom', $nom],
                ['prenom', $prenom],
                ['email', $email],
                ['cne', $cne],
                ['ced', $ced],
                ['fd', $fd]
            ])->first();

            if ($user) {
                Auth::login($user);
                return view('mobility');
            } else {
                return redirect('/');
            }
        } catch (\Throwable $th) {
            return dd('Something went wrong!', $th);
        }
    }
}
