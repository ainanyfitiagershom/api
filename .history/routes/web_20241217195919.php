<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/send-test-email', function () {
    Mail::to('destinataire@gmail.com')->send(new TestEmail());
    return 'Email envoyé avec succès !';
});
