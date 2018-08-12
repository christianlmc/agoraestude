<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Simulado;
use Illuminate\Support\Facades\Storage;

use Auth;

class ArquivoController extends Controller
{
    public function show($tipo, $id)
    {
    	$simulado = Simulado::find($id);

    	if(Auth::user()->cursos->find($simulado->curso_id) || Auth::user()->admin){
	    	$path = "cursos/" . $simulado->curso_id . "/" . $tipo . "/" . $id . ".pdf";

	    	if(Storage::exists($path)){
	    		if($tipo == "simulados"){
	    			return Storage::download($path, $simulado->nome . ".pdf");
	    		}
	    		elseif ($tipo == "gabaritos") {
	    			return Storage::download($path, "(Gabarito) " . $simulado->nome . ".pdf");
	    		}
	    	}
    	}
    	else{
    		return view("home");
    	}
    }
}
