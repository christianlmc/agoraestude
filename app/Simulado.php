<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simulado extends Model
{
   protected $fillable = [
		'nome', 'data_disponivel', 'curso_id'
   ];
}
