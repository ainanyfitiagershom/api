<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/send-test-email', function () {
    Mail::to('destinataire@gmail.com')->send(new TestEmail());
    return 'Email envoyé avec succès !';
});
