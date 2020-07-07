<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Eleve;
use App\Models\Professeur;
use App\Models\Surveillant;
use App\Models\Tuteur;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomUtilisateur','profil', 'password','photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function getFullNameAttribute(){
        $full;
        switch ($this->profil) {
            case 'professeur':
                $user = Professeur::where('nomUtilisateur',$this->nomUtilisateur)->firstOrFail();
                $full = "{$user->prenom} {$user->nom}";
                break;
            case 'eleve' :
                $user = Eleve::where('nomUtilisateur',$this->nomUtilisateur)->firstOrFail();
                $full = "{$user->prenom} {$user->nom}";
            break;
            case 'surveillant':
                $user = Surveillant::where('nomUtilisateur',$this->nomUtilisateur)->firstOrFail();
                $full = "{$user->prenom} {$user->nom}";
                break;
                case 'tuteur':
                    $user = Tuteur::where('nomUtilisateur',$this->nomUtilisateur)->firstOrFail();
                    $full = "{$user->prenom} {$user->nom}";
                    break;
                    case 'directeur':
                        $full = "Le Directeur,Assane Diallo";
                        break;
            default:
               $full="";
                break;
        }
       /* if(=='professeur'){

        }
        if($this->profil=='eleve'){
            $user = Eleve::where('nomUtilisateur',$this->nomUtilisateur)->firstOrFail();
            $full = "{$user->prenom} {$user->nom}";
            }
            if($this->profil=='surveillant'){
                $user = Surveillant::where('nomUtilisateur',$this->nomUtilisateur)->firstOrFail();
                $full = "{$user->prenom} {$user->nom}";
                }
                if($this->profil=='Tuteur'){
                    $user = Tuteur::where('nomUtilisateur',$this->nomUtilisateur)->firstOrFail();
                    $full = "{$user->prenom} {$user->nom}";
                    }

*/                    return $full;
    }

}
