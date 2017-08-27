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

	public function adicionar(){
        return view('admin.adicionar');
   }

	public function salvar(Request $req){
	  $dados = $req->all();

	  if(isset($dados['publicado'])){
	      $dados['publicado']    = 'sim';
	  }
	  else
	      $dados['publicado']    = 'nao';
	  Oportunidade::create($dados);
	  return redirect()->route('admin.index');
	}
}
