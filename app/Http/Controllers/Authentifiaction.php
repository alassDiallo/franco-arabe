<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\Professeur;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class Authentifiaction extends Controller
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
    }

   public function redirectTo(){

       $profil=Auth::user()->profil;
       switch($profil){
        case 'directeur':
            $redirectTo = '/ac';
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
                       return $redirectTo;
                    break;
       }
       return $redirectTo;
    }
}
