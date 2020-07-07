<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class anneeScolaire extends Model
{
    protected $fillable = ['anneeDebut','anneeFin'];

    public function eleves(){
        return $this->belongsToMany('App\Models\eleve')->withTimestamps();
    }
}
