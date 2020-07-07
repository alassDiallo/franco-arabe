<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = ['nom','prenom','adresse','telephone','dateDeNaissance',
    'lieuDeNaissance','nomUtilisateur','sexe','motDePass','tuteur_id','photo'];
    protected $casts = [
        'dateDeNaissance'=>'date',
    ];

    public function getRouteKeyName(){
        return 'nomUtilisateur';
    }

    public function anneeScolaires(){
        return $this->belongsToMany('App\Models\anneeScolaire')->withTimestamps();
    }

    public function classes(){

        return $this->belongsToMany('App\Models\Classe','inscriptions')
                                    ->withPivot('anneeScolaire','montant','reliquat','statu','created_at')
                                    ->withTimestamps();
    }

    public function tuteur(){
        return $this->belongsTo('App\Models\Tuteur');
    }

    public function bultins(){

        return $this->hasMany('App\Models\Bultin');
    }

   /* public function matieres(){
        return $this->belongsToMany('App\Models\Matiere','notes')
                    ->withPivot('anneeScolaire','devoir1','devoir2','semestre','composition')
                    ->withTimestamps();;
    }*/

    public function matieres(){
        return $this->belongsToMany('App\Models\Matiere','evaluations')
                    ->withPivot('anneeScolaire','note','semestre')
                    ->withTimestamps();;
    }

    public function matiere_arabes(){
        return $this->belongsToMany('App\Models\MatiereArabe','evaluationArabes')
                    ->withPivot('anneeScolaire','note','semestre')
                    ->withTimestamps();;
    }

    public function mois(){
        return $this->belongsToMany('App\Models\Mois','mensualites')
                    ->withPivot('anneeScolaire','montant_verser','reste')
                    ->withTimestamps();
    }

}
