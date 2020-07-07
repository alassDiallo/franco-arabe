<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['note','semestre','anneeScolaire','matiere_id','eleve_id'];
}
