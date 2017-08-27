<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oportunidade;

class OportunidadeController extends Controller
{
	public function home(){
		$registros = Oportunidade::all();
		return view('index', compact('registros'));
	}
}
