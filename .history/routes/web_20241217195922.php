<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/send-test-email', function () {
    Mail::to('destinataire@gmail.com')->send(new TestEmail());
    return 'Email envoyé avec succès !';
});
