<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    // Spécifiez le nom de la table si elle ne suit pas la convention Laravel
    protected $table = 'utilisateurs';

    // Définir les champs qui sont mass assignable
    protected $fillable = [
        'email', 
        'mdp', 
        'nom', 
        'isverified', 
        'tentative'
    ];
    public $timestamps = true;

    protected static function booted()
    {
        static::creating(function ($utilisateur) {
            $utilisateur->mdp = bcrypt($utilisateur->mdp);  // Cryptage du mot de passe
        });
    }

    // Méthode pour vérifier si l'utilisateur est vérifié
    public function isVerified()
    {
        return $this->isverified;
    }
}
