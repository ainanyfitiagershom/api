<?php

use App\Http\Controllers\UserCtrl;
use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('login');
});


Route::get('client/create', [UserCtrl::class, 'inscription'])->name('user.register');

Route::get('/send-test-email', function () {
    Mail::to('gershomfitia@gmail.com')->send(new TestEmail());
    return 'Email envoyé avec succès !';
})->name('send.email');

Route::get('/validate-email/{id}', function ($id) {
    // Cherche l'utilisateur par son ID
    $utilisateur = Utilisateur::find($id);

    if ($utilisateur && !$utilisateur->isverified) {
        // Si l'utilisateur existe et n'est pas encore vérifié, on met à jour le statut
        $utilisateur->isverified = true;
        $utilisateur->save();

        return redirect('/login')->with('success', 'Votre email a été vérifié avec succès. Vous pouvez maintenant vous connecter.');
    } else {
        return redirect('/login')->withErrors(['email' => 'Lien de validation invalide ou déjà utilisé.']);
    }
});
