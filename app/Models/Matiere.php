<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = ['nomMatiere','nomArabe','reference'];

    public function getRouteKeyName()
    {
        return 'reference';
    }

    public function classes(){

        return $this->belongsToMany('App\Models\Classe')
                                    ->withPivot('coefficient');
    }

    public function professeurs(){

        return $this->belongsToMany('App\Models\Professeur')
                                    ->withPivot('coefficient')
                                    ->withTimestamps();;
    }

    /*public function eleves(){
        return $this->belongsToMany('App\Models\Eleve','notes')
                    ->withPivot('anneeScolaire','devoir1','devoir2','semestre','composition')
                    ->withTimestamps();;
    }*/

    public function eleves(){
        return $this->belongsToMany('App\Models\Eleve','evaluations')
                    ->withPivot('anneeScolaire','note','semestre')
                    ->withTimestamps();
    }

    /*public function eleves(){
        return $this->belongsToMany('App\Models\Eleve','notes')
                    ->withPivot('anneeScolaire','note','semestre','nomEvaluation')
                    ->withTimestamps();;
    }*/
}
