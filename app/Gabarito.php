<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gabarito extends Model
{
    protected $fillable = [
		'simulado_id', 'nome', 'data_disponivel',
   ];

   protected $visible = ['nome', 'data_disponivel'];

   protected $primaryKey = 'simulado_id';
}
