<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mois extends Model
{
    protected $fillable =['nomMois'];

    public function eleves(){
        return $this->belongsToMany('App\Models\Eleve','mensualites')
                    ->withPivot('anneeScolaire','montant_versee','reste')
                    ->withTimestamps();
    }
}
