<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surveillant extends Model
{
    protected $fillable = ['nom','prenom','adresse','telephone','nomUtilisateur','sexe'];

    public function classes(){
        return $this->belongsToMany('App\Models\Classe','surveillers')
                    ->withPivot('anneeScolaire')
                    ->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'nomUtilisateur';
    }
}
