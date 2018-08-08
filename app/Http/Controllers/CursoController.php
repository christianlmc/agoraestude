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

    public function showSimulados($id)
    {
    	$simulados = Curso::find($id)->simulados()->get();
    	return $simulados;
    }
}
