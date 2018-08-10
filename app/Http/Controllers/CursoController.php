<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Curso;

class CursoController extends Controller
{
    public function index()
    {
    	$cursos = Curso::all();
        return $cursos;
    }

    public function showSimuladosGabarito($id)
    {
    	$simulados = Curso::find($id)->simulados()->with('gabarito')->get();
    	// $simulados->gabarito;

    	return $simulados;
    }
}
