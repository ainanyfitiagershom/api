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

class UserCtrl extends Controller
{
    public function register() 
    {
        return view('auth/register');
    }

   
    public function login() {
        return view('auth/login');
    }

  
 

}
