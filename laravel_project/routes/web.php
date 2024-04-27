<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\FormDoctController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorantController;
use App\Http\Controllers\EnseignatController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SplitRoutesController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\PublicationEnsController;
use App\Http\Controllers\CommunicationEnsController;

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

Route::get('/bienvenue', function () {
    return view('bienvenue');
})->name('bienvenue');

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

Route::post('doctoroant/cree-communication', [CommunicationController::class, 'store'])->name('doctoroant-cree-communication')->middleware('auth');

Route::post('doctoroant/cree-publication', [PublicationController::class, 'store'])->name('doctoroant-cree-publication')->middleware('auth');

Route::post('/form-submit', [FormDoctController::class, 'submitForm'])->name('form.doct.submit')->middleware('auth');

Route::get('/generate-pdf', [PdfController::class, 'generatePDF'])->name('generatePDF')->middleware('auth');

// Dashboard routes

Route::get('/dashboard/view/{view}', [DashboardController::class, 'renderView'])->name('dashboard.view')->middleware('auth');
Route::get('/dashboard-ens/view/{view}', [DashboardController::class, 'renderEnsView'])->name('dashboard_ens.view')->middleware('auth');

// enseignat routes

Route::get('/enseignant/mobility', function () {
    return view('components.enseignant.mobility_ens');
})->name('mobility-ens')->middleware('auth');

Route::post('/enseignant/form-submit', [FormDoctController::class, 'submitEnsForm'])->name('form.ens.submit')->middleware('auth');

Route::get('/enseignant/logout', function () {
    return view('components.enseignant.logout_enseignant');
})->name('logout_ens')->middleware('auth');

Route::get('/enseignant/generate-pdf', [PdfController::class, 'generateEnsPDF'])->name('generateEnsPDF')->middleware('auth');

Route::post('/enseignant/cree-communication', [CommunicationEnsController::class, 'store'])->name('enseignant-cree-communication')->middleware('auth');

Route::post('/enseignant/cree-publication', [PublicationEnsController::class, 'store'])->name('enseignant-cree-publication')->middleware('auth');

// Shared routes

Route::get('/decide-view',[SplitRoutesController::class, 'splitSpace'])->name('redirectToSpace');

// test routes

Route::get('/dash', function () {
    return view('components.doct_dashboard.dashboard');
});
