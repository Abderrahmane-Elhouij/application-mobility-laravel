<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Notifications\SendMagicLinkNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

class DoctorantController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function email()
    {
        return 'email';
    }

    public function redirectToLogin()
    {
        return view('components.login_doctorant');
    }

    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackGoogle()
    {

        $user = Socialite::driver('google')->stateless()->user();
        $email = $user->getEmail();

        $doctorant = Doctorant::where('email', $email)->first();
        $enseignant = Enseignant::where('email', $email)->first();

        if ($doctorant || $enseignant) {
            return view('components.login_doctorant', compact('email'));
        }

        return redirect()->route('login-doctorant')->withErrors(['email' => 'L’e-mail fourni ne correspond à aucun utilisateur inscrit.'])
            ->withInput();
    }

    public function login(Request $request)
    {

        if ($request->input('submit') == 'magic-link') {

            $user = $this->loginViaMagicLink($request);

            if ($user) {
                return redirect()->route('login-doctorant')
                    ->with('message', "Un lien d'authentification a été envoyé à votre adresse email");
            } else {
                return redirect()->route('login-doctorant')
                    ->withErrors(['email' => 'L’e-mail fourni ne correspond à aucun utilisateur inscrit.'])
                    ->withInput();
            }
        }

        $this->validateLogin($request);

        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function loginViaMagicLink(Request $request)
    {
        $doctorant = Doctorant::where('email', $request->input('email'))->first();
        $enseignant = Enseignant::where('email', $request->input('email'))->first();

        if ($doctorant) {
            Auth::guard('doctorants')->login($doctorant);
            $doctorant->notify(new SendMagicLinkNotification());
            return $doctorant;

        } elseif ($enseignant) {
            Auth::guard('enseignant')->login($enseignant);
            $enseignant->notify(new SendMagicLinkNotification());
            return $enseignant;
        } else {
            return null;
        }
    }
}
