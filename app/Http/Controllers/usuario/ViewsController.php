<?php

namespace App\Http\Controllers\usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oportunidade;

class ViewsController extends Controller
{
	public function home(){
		$registros = Oportunidade::all();
		return view('index', compact('registros'));
	}

	public function postagem($id){
		$registro = Oportunidade::find($id);
		return view('postagem', compact('registro'));
	}
	
	public function sobre(){
		return view('sobre');
	}
}
