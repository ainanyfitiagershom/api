<?
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

    // La table ne contient pas de champ "updated_at", donc si vous ne l'utilisez pas, vous pouvez désactiver les timestamps
    public $timestamps = true;

    // Optionnel: Si vous souhaitez que les mots de passe soient toujours cryptés avant d'être enregistrés
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
