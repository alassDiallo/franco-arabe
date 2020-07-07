<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
   protected $fillable = ['nomClasse','montantInscription','mensualite'];

public function getRouteKeyName(){
return 'nomClasse';
}
   public function eleves(){

    return $this->belongsToMany('App\Models\Eleve','inscriptions')
                                ->withPivot('anneeScolaire','montant','reliquat','statu','created_at')
                                ->withTimestamps();
}

public function matieres(){

    return $this->belongsToMany('App\Models\Matiere')
                                ->withPivot('coefficient')
                                ->withTimestamps();
}

public function matiere_arabes(){
    return $this->belongsToMany('App\Models\MatiereArabe','matiereArs')
                ->withPivot('coefficient')
                ->withTimestamps();;
}

public function surveillants(){

    return $this->belongsToMany('App\Models\Surveillant','surveillers')
                                ->withPivot('anneeScolaire')
                                ->withTimestamps();
}
public function professeurs(){
    return $this->belongsToMany('App\Models\Professeur')
                ->withPivot('anneeScolaire','matiere')
                ->withTimestamps();
}

}
