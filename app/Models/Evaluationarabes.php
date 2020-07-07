<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluationarabes extends Model
{
    protected $fillable = ['note','semestre','anneeScolaire','matiere_arabe_id','eleve_id'];
}
