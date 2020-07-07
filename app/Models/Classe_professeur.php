<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe_professeur extends Model
{
        protected $fillable = ['professeur_id','classe_id','anneeScolaire','matiere'];
}
