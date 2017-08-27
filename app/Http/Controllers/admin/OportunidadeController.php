<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oportunidade;

class OportunidadeController extends Controller
{

	public function index(){
		$registros = Oportunidade::orderBy('created_at', 'DESC')->get();
		$publicados = (Oportunidade::where('publicado','sim')->count());
		$naopublicados = (Oportunidade::where('publicado','nao')->count());
		return view('admin.index', compact('registros', 'publicados', 'naopublicados'));
	}
}
