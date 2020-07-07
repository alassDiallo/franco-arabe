<?php

use App\Models\Eleve;
use App\Models\Professeur;
//use App\Models\Professeur;
use App\Models\Tuteur;
use App\Models\Bultin;
use App\Models\Matiere;
use App\Models\anneeScolaire;
use Illuminate\Support\Facades\Auth;

if(! function_exists('verifBultin')){
    function verifBultin($id,$an,$s){
        $eleve = Eleve::where('nomUtilisateur',$id)->first();
        if(Bultin::where([
            'eleve_id'=>$eleve->id,
            'semestre'=>$s,
            'anneeScolaire'=>$an
            ])->first()){
                return 'disabled';
            }
            return '';
    }
}

if(! function_exists('lien')){

    function lien(){
        $anneeScolaire;
        $annee = anneeScolaire::all()->last();
        $anneeScolaire= $annee->anneeDebut.'-'.$annee->anneeFin;
        if(annee()==$anneeScolaire){
        return 'vrai';

        }
        return 'faux';
    }
}

if(! function_exists('anneescolaire')){

    function anneeScolaire(){
        $annee = anneeScolaire::all()->last();
       return  $annee->anneeDebut.'-'.$annee->anneeFin;

 }
}

if(! function_exists('annee')){
    function annee(){
        $anneeScolaire;
        if(request()->anneeScolaire){
            $annee = explode('-',request()->anneeScolaire);
            $anneedebut = $annee[0];
            $anneeFin =$annee[1];
            if(anneeScolaire::where(['anneeDebut'=>$anneedebut,'anneeFin'=>$anneeFin])->first()){
            $anneeScolaire=request()->anneeScolaire;

        }
        else{
            $annee = anneeScolaire::all()->last();
            $anneeScolaire= $annee->anneeDebut.'-'.$annee->anneeFin;
        }
        }
        else{
        $annee = anneeScolaire::all()->last();
        $anneeScolaire= $annee->anneeDebut.'-'.$annee->anneeFin;

        }
    return $anneeScolaire;
    }
}

if(! function_exists('verifBultinE')){
    function verifBultinE($id,$an,$s){
        $eleve = Eleve::where('nomUtilisateur',$id)->first();
        if( Bultin::where([
            'eleve_id'=>$eleve->id,
            'semestre'=>$s,
            'anneeScolaire'=>$an
            ])->first()){
                return '';
            }
            return 'disabled';

    }
}

if(!function_exists('nomination')){
    function nomination($sexe){
        switch($sexe){
            case 'homme':
            return "Monsieur";
            case 'femme':
            return 'Madame';
        }
    }
}

if(! function_exists('flash')){
    function flash($message,$type='success'){
        session()->flash('notification.message',$message);
        session()->flash('notification.type',$type);
    }
}

if(! function_exists('nomUser')){
            function nomUser(){
                $nomUtilisateur = rand(1000,9999).date('Y');
                if(Eleve::where('nomUtilisateur',$nomUtilisateur)->count() >=1)
                return nomUser();
                return $nomUtilisateur;

        }
}
if(! function_exists('nomUserTuteur')){
    function nomUserTuteur(){
        $nomUtilisateur = rand(1000,9999).date('Y');
        if(Tuteur::where('nomUtilisateur',$nomUtilisateur)->count() >=1)
        return nomUserTuteur();
        return $nomUtilisateur;

}
}
/*if(! function_exists('user')){
    function user(){
        $class= ucfirst(Auth::user()->profil);
        $::where('nomUtilisateur',Auth::user()->nomUtilisateur)->first();
        dd($user);
        //return $user;
}
}*/

if(! function_exists('nomUserSurveillant')){
    function nomUserSurveillant(){
        $nomUtilisateur = rand(1000,9999).date('Y');
        if(Professeur::where('nomUtilisateur',$nomUtilisateur)->count() >=1)
        return nomUserSurveillant();
        return $nomUtilisateur;

}
}
if( ! function_exists('reference')){
    function reference(){
        $ref = 'REF'.rand(0,10000);
        if(Matiere::where('reference',$ref)->first()){
            reference();
        }
        else
        return $ref;
    }
}
if(! function_exists('appreciation')){
    function appreciation($m){
        if($m < 5)
        return 'Insuffisant';
        else{
            if($m<6)
            return 'Passable';
            if($m<7)
            return 'Assez-bien';
            if($m<=8)
            return 'Bien';
            if($m<=9)
            return 'Tres Bien';
            else
            return 'Excellent';
        }
    }
}

if(! function_exists('boite')){
    function boite($id){
    if($id < 5)
        return 'checked';
    else
    {
        if($id<7)
    return 'checked';
    else
    return 'checked';
    }

    }

}
