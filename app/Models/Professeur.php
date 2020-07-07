<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    protected $fillable = ['nom','prenom','adresse','telephone','nomUtilisateur','sexe'];
    public function classes(){

        return $this->belongsToMany('App\Models\Classe')
                    ->withPivot('anneeScolaire','matiere')
                    ->withTimestamps();;
    }

    public function matieres(){

        return $this->belongsToMany('App\Models\Matiere')->withTimestamps();;
    }

    public function getRouteKeyName()
    {
        return 'nomUtilisateur';
    }
}
