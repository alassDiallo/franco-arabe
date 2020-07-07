<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tuteur extends Model
{
    protected $fillable = ['nom','prenom','telephoneTuteur','nomUtilisateur','motDePasse'];

    public function eleves(){
        return $this->hasMany('App\Models\Eleve');
    }


    public function getRouteKeyName()
    {
        return 'nomUtilisateur';
    }
}
