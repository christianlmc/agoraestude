<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Simulado;
use App\Gabarito;
use Illuminate\Support\Facades\Storage;

class SimuladoController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
    		'curso_id' => 'exists:cursos,id',
    		'nome' => 'required',
    		'simulado_file' => 'required|file|mimes:pdf',
    		'data_disponivel' => 'required|date_format:Y-m-d',

    		'gabarito_file' => 'required|file|mimes:pdf',
    		'gabarito_data_disponivel' => 'required|date_format:Y-m-d'
    	]);

    	try{
    		$simulado = Simulado::create([
    			'curso_id'			=> $request->curso_id,
    			'nome' 				=> $request->nome,
    			'data_disponivel' 	=> $request->data_disponivel
    		]);

    		$simulado->gabarito()->create([
    			'data_disponivel' => $request->gabarito_data_disponivel,
    		]);

    		$path = $this->getPath($request->curso_id);

    		Storage::putFileAs($path->simulado, $request->file('simulado_file'), $simulado->id . ".pdf");
    		Storage::putFileAs($path->gabarito, $request->file('gabarito_file'), $simulado->id . ".pdf");

    		$simulado->gabarito;
    	}
    	catch(\Exception $e){
    		throw new \Exception('Erro: ' . $e->getMessage());
    	}

    	return $simulado;
    }

    public function destroy($id)
    {
    	try{
    		$simulado = Simulado::findOrFail($id);

    		$path = $this->getPath($simulado->curso_id);

    		Storage::delete($path->simulado . $simulado->id . ".pdf");
    		Storage::delete($path->gabarito . $simulado->id . ".pdf");

    		Gabarito::destroy($id);
    		Simulado::destroy($id);
    	}
    	catch(\Exception $e){
    		throw new \Exception('Erro: ' . $e->getMessage());
    	}

    	return;
    }

    private function getPath($curso_id)
    {
    	$path = new \stdClass();
    	$path->simulado = "cursos/" . $curso_id . "/simulados/";
    	$path->gabarito = "cursos/" . $curso_id . "/gabaritos/";

    	return $path;
    }
}
