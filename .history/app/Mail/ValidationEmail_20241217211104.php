
namespace App\Mail;

use App\Models\Utilisateur;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $utilisateur;

    public function __construct(Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;
    }

    public function build()
    {
        return $this->view('emails.validation')
                    ->with([
                        'url' => route('validate.email', ['token' => $this->utilisateur->id])
                    ])
                    ->subject('Validation de votre compte');
    }
}
