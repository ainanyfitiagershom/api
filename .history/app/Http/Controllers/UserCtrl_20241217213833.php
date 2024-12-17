<?php

namespace App\Http\Controllers;

use App\Mail\ValidationEmail;
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


    public function login() {
        return view('auth/login');
    }

    public function inscription() 
    {
        return view('auth/register');
    }

   
  // Exemple dans un contrôleur
  public function register(Request $request)
  {
      // Validation des données d'entrée
      $request->validate([
          'email' => 'required|email|unique:utilisateurs,email',
          'nom' => 'required|string',
          'mdp' => 'required|string|min:6|confirmed',
      ]);
  
      // Création de l'utilisateur
      $utilisateur = Utilisateur::create([
          'email' => $request->email,
          'nom' => $request->nom,
          'mdp' => bcrypt($request->mdp),
      ]);
  
      $url = route('validate.email', ['id' => $utilisateur->id]);

        Mail::to($utilisateur->email)->send(new ValidationEmail($utilisateur, $url));
  
      return back()->with('success', 'Un e-mail de validation a été envoyé. Veuillez vérifier votre boîte de réception.');
 
    }


    public function validateEmail($id)
{
    // Récupérer l'utilisateur par ID
    $utilisateur = Utilisateur::findOrFail($id);

    $utilisateur->isverified = true;
    $utilisateur->save();

    return redirect('log')->with('success', 'Votre adresse e-mail a été validée avec succès.');
}

}
