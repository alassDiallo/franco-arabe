<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bultin extends Model
{
    protected $fillable =['semestre','anneeScolaire','moyenne','eleve_id','moyenneArabe'];

    public function eleve(){
        return $this->belongsTo('App\Models\Eleve');
    }
}
