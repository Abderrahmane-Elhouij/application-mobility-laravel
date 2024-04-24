<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
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

        return view('components.login_doctorant', compact('email'));
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
                    ->withErrors(['email' => 'L’e-mail fourni ne correspond à aucun doctorant inscrit.'])
                    ->withInput();
            }
        }

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
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

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function loginViaMagicLink(Request $request)
    {
        //dd($request->all()); // Dump the request data
        $user = Doctorant::where('email', $request->input('email'))->first();
        //$user = Doctorant::whereRaw('LOWER(email) = ?', [strtolower($request->input('email'))])->first();

        //dd(DB::getQueryLog());

        if ($user) {
            $user->notify(new SendMagicLinkNotification());
        } else {
            return redirect()->route('login-doctorant')
                ->withErrors(['email' => 'Email not found.']);
        }

        return $user;
    }
}
