<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensualite extends Model
{

    protected $fillable = ['anneeScolaire','somme_verser','reste'];

}
