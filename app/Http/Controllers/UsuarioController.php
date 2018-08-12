<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Curso;
use Auth;

class UsuarioController extends Controller
{
	public function index()
    {
        return view('home');
    }

    public function curso($id)
    {
    	if(Auth::user()->cursos->find($id) || Auth::user()->admin){
	    	return view('simulados', ['curso' => Curso::findOrFail($id)]);
	    }
	    else{
	    	return view('home');
	    }
    }
}
