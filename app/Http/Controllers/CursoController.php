<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Curso;
use Auth;

class CursoController extends Controller
{
    public function index()
    {
    	if (Auth::user()->admin) {
    		$cursos = Curso::all();
    	}
    	else{
    		$cursos = Auth::user()->cursos;
    	}

        return $cursos;
    }

    public function showSimuladosGabarito($id)
    {
    	$simulados = Curso::find($id)->simulados()->with('gabarito')->get();
    	// $simulados->gabarito;

    	return $simulados;
    }
}
