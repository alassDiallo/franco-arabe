<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = ['nomClasse','eleve_id','anneeScolaire','classe_id','montant','reliquat','statu'];
    protected $casts = ['dateInscription' => 'date'];
}
