<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe_eleve extends Model
{
    protected $fillable = ['montant','reliquat','statu','dateInscription','classe_id','eleve_id','anneeScolaire'];
}
