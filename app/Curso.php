<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
	public $timestamps = false;

	public function simulados()
	{
		return $this->hasMany('App\Simulado');
	}
}
