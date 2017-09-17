<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oportunidade;

class OportunidadeController extends Controller
{

	public function index(){
		$registros = Oportunidade::orderBy('created_at', 'DESC')->get();
		return view('admin.index', compact('registros'));
	}
	public function loadchart(){
		$registros = Oportunidade::orderBy('created_at', 'DESC')->get();
		$publicados = (Oportunidade::where('publicado','sim')->count());
		$naopublicados = (Oportunidade::where('publicado','nao')->count());
		$postagens = count($registros);
		return(compact('postagens','publicados', 'naopublicados'));
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
	public function editar($id){
		$registro = Oportunidade::find($id);
		return view('admin.editar', compact('registro'));
	}

	public function atualizar(Request $req, $id){
		$dados = $req->all();

		if(isset($dados['publicado'])){
			$dados['publicado']	= 'sim';
		}
		else
			$dados['publicado']	= 'nao';
		Oportunidade::find($id)->update($dados);
		return redirect()->route('admin.index');
	}

	public function deletar($id){
		Oportunidade::find($id)->delete();
		return redirect()->route('admin.index');		
	}

	public function publicado(Request $id){
		$id = $id->all();
		$id = $id["id"];
		$oportunidade = Oportunidade::find($id);
		if($oportunidade->publicado == 'nao'){
			$oportunidade->publicado = "sim";	
		}else{
			$oportunidade->publicado = "nao";
		}
		$oportunidade->update();
		return($oportunidade->publicado);
	}
}
