<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormDoctController;
use App\Http\Controllers\DoctorantController;
use App\Http\Controllers\EnseignatController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PdfController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Acceuil route
Route::get('/', function () {
    return view('home');
})->name('home');

//Route::get('/home', function() {
//    return redirect('/login-doctorant');
//});

// Google routes
Route::get('/auth/google', [DoctorantController::class, 'redirect'])->name('google_auth')->middleware('guest');

Route::get('auth/google/call-back', [DoctorantController::class, 'callbackGoogle'])->name('verify');

// Doctorant routes
Route::get('/login-doctorant', [DoctorantController::class, 'redirectToLogin'])->name('login-doctorant')->middleware('guest');

Route::post('/se-connecter', [DoctorantController::class, 'login'])->name('sub.doctorant');

Route::post('/logout-doctorant', [FormDoctController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/logout', function () {
    return view('components.logout_doctorant');
})->name('logout_form')->middleware('auth');

Route::get('/mobility', function () {
    return view('components.mobility_doct');
})->name('mobility')->middleware('auth');

Route::post('/form-submit', [FormDoctController::class, 'submitForm'])->name('form.doct.submit')->middleware('auth');

Route::get('/generate-pdf', [PdfController::class, 'generatePDF'])->name('generatePDF')->middleware('auth');

// enseignat routes
Route::get('/login-enseignant', [EnseignatController::class, 'login'])->name('login-enseignant')->middleware('guest');

// test routes

Route::get('/pdf', function () {
    return view('partials.header');
});

Route::get('/dash', function () {
    return view('components.doct_dashboard.dashboard');
});