<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-test-email', function () {
    Mail::to('gershomfitia@gmail.com')->send(new TestEmail());
    return 'Email envoyé avec succès !';
})->name('send.email');

Route::get('/validate-email/{token}', function ($token) {
    // Recherche de l'utilisateur par son ID (ou token unique si vous préférez un token généré)
    $utilisateur = Utilisateur::find($token);

    if ($utilisateur) {
        // Mettre à jour le statut isverified
        $utilisateur->update(['isverified' => true]);

        return redirect()->route('login')->with('status', 'Votre compte a été validé avec succès.');
    }

    return redirect()->route('login')->with('error', 'Le lien de validation est invalide.');
})->name('validate.email');
