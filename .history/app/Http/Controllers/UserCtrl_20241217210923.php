<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Users;
use App\Rules\NumeroMatricule;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCode;
use App\Models\Utilisateur;

class UserCtrl extends Controller
{
    public function register() 
    {
        return view('auth/register');
    }

   
  // Exemple dans un contrôleur
public function register(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:utilisateurs',
        'nom' => 'required|string',
        'mdp' => 'required|min:8|confirmed',
    ]);

    // Création de l'utilisateur avec isverified = false
    $user = Utilisateur::create([
        'email' => $request->email,
        'nom' => $request->nom,
        'mdp' => bcrypt($request->mdp),
        'isverified' => false,
    ]);

    // Envoi de l'email de validation
    Mail::to($user->email)->send(new ValidationEmail($user));

    return redirect()->route('login')->with('status', 'Vérifiez votre email pour valider votre compte.');
}


  
 

}
