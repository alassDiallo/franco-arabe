<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatiereArabe extends Model
{
    protected $fillable = ['nomFr','nomAr'];

    public function eleves(){
        return $this->belongsToMany('App\Models\Eleve','evaluationArabes')
                    ->withPivot('anneeScolaire','note','semestre')
                    ->withTimestamps();;
    }

    public function classes(){
        return $this->belongsToMany('App\Models\Classe','matiereArs')
                    ->withPivot('coefficient')
                    ->withTimestamps();;
    }
}
