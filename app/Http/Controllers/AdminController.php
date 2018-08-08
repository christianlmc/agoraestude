<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Curso;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.home');
    }

    public function curso($id)
    {
    	return view('admin.curso', ['curso' => Curso::findOrFail($id)]);
    }
}
