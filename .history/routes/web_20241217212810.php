<?php

use App\Http\Controllers\UserCtrl;
use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('login');
});


Route::get('/inscription', [UserCtrl::class, 'inscription'])->name('inscription');

Route::get('/send-test-email', function () {
    Mail::to('gershomfitia@gmail.com')->send(new TestEmail());
    return 'Email envoyé avec succès !';
})->name('send.email');

// Traiter l'inscription
Route::post('/register', [AuthController::class, 'register']);

// Route pour valider l'email de l'utilisateur (cette route doit mettre à jour isverified à true)
Route::get('/validate-email/{id}', [AuthController::class, 'validateEmail'])->name('validate.email');
