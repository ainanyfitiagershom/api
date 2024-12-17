<?php

use App\Http\Controllers\UserCtrl;
use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('auth/login');
})->name('inscription');


Route::get('/inscription', [UserCtrl::class, 'inscription'])->name('inscription');

Route::get('/send-test-email', function () {
    Mail::to('gershomfitia@gmail.com')->send(new TestEmail());
    return 'Email envoyé avec succès !';
})->name('send.email');

// Traitement
Route::post('/register', [UserCtrl::class, 'register'])->name('register');

Route::get('/validate-email/{id}', [UserCtrl::class, 'validateEmail'])->name('validate.email');
