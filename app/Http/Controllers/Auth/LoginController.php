<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\Professeur;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //dd('login');
    }
    public function username()
    {
        return 'nomUtilisateur';
    }
   public function redirectTo(){

       $profil=Auth::user()->profil;
       switch($profil){
        case 'directeur':
            $redirectTo = '/accueil';
            break;

            case 'professeur':
                $redirectTo = 'connexionProf';
                break;

                case 'eleve':
                    $redirectTo = 'connexionEleve';
                    break;

                    case 'surveillant':
                        $redirectTo = 'connexionSurveillant';
                        break;
                       default:
                        $redirectTo='/home';
                    break;
       }
       return $redirectTo;
    }
}
