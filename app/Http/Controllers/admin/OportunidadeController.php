<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Oportunidade;
use App\Area;
use App\Curso;
use Auth;

class OportunidadeController extends Controller
{

	public function index()
	{
		$registros = Oportunidade::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->get();
		$areas = Area::orderBy('descricao', 'ASC')->get();
		return view('admin.index', compact( ['registros', 'areas'] ));
	}



	public function loadchart(){
		$registros = 		Oportunidade::where('email_criador', Auth::user()->email)
		->get();
		$publicados =	 	Oportunidade::where('publicado','sim')
		->where('email_criador', Auth::user()->email)
		->count();
		$naopublicados =	Oportunidade::where('publicado','nao')
		->where('email_criador', Auth::user()->email)
		->count();
		$postagens = count($registros);
		return(compact('postagens','publicados', 'naopublicados'));
	}




	public function adicionar(){
		$areas     	= Area::orderBy('descricao', 'asc')->get();
		$cursos     = Curso::orderBy('descricao', 'asc')->get();
		return view('admin.adicionar',compact(['registros', 'areas', 'cursos']));
	}


	public function salvar(Request $req){
		/*		REQUESTS    */
		$dados = $req->all();
		$dados['email_criador'] = Auth::user()->email;
		$dados['user_id'] = Auth::user()->id;
		$file = $req->file('edital');
		if($file != NULL){
			$storagePath = storage_path().'/app/public/editais/'.Auth::user()->id;
			$fileName = time(). '.' .$file->getClientOriginalExtension();
			/* DATABASE DADOS ARQUIVO */
			$dados['edital_extension'] = $file->getClientMimeType();
			$dados['edital_location'] = '/app/public/editais/'.Auth::user()->id.'/'.$fileName;
			$dados['edital'] = $file->getClientOriginalName();
			/*    STORAGE    */
			$file->move($storagePath, $fileName);
		}
		if(isset($dados['publicado'])){
			$dados['publicado']    = 'sim';
		}
		else{
			$dados['publicado']    = 'nao';
		}
		Oportunidade::create($dados);

		return redirect()->route('admin.index');
	}


	public function editar($id){
		if(Auth::check()){
			$registro = Oportunidade::find($id);
			$areas    = Area::orderBy('descricao', 'asc')->get();
			$cursos   = Curso::orderBy('descricao', 'asc')->get();
			return view('admin.editar', compact(['registro', 'areas', 'cursos']));
		}
		else{
			return redirect()->route('login');
		}
	}

	public function atualizar(Request $req, $id){
		/*		REQUESTS 	*/
		$old = Oportunidade::find($id);
		$storagePath = storage_path().$old['edital_location'];
		$old_fileName = $old['edital'];
		$new_file = $req->file('edital');
		$dados = $req->all();
		if($new_file != NULL){
			$fileName = time(). '.' .$new_file->getClientOriginalExtension();
			/* DATABASE DADOS ARQUIVO */
			$dados['edital'] = $new_file->getClientOriginalName();
			$dados['edital_extension'] = $new_file->getClientMimeType();
			/* STORAGE */
			$dados['edital_location'] = '/app/public/editais/'.Auth::user()->id.'/'.$fileName;
			$new_file->move(storage_path().'/app/public/editais/'.Auth::user()->id.'/', $fileName);
			/* DELETAR ARQUIVO ANTIGO */
			if($old['edital'] != NULL){
				unlink($storagePath);
			}
		}
		if(isset($dados['publicado'])){
			$dados['publicado']	= 'sim';
		}
		else{
			$dados['publicado']	= 'nao';
		}
		Oportunidade::find($id)->update($dados);
		return redirect()->route('admin.index');
	}

	public function deletarArquivo(Request $id){
		$id = $id->input('id');
		$dados = Oportunidade::find($id);
		$storagePath = storage_path().$dados['edital_location'];
		$dados['edital'] = NULL;
		$dados['edital_location'] = NULL;
		$dados['edital_extension'] = NULL;
		unlink($storagePath);
		$dados->update();
		return;
	}



	public function deletar($id){
		if(Auth::check()){
			$destroy = Oportunidade::find($id);
			if(Auth::user()->id == $destroy['user_id']){
				if($destroy['edital_location']){
					$storagePath = storage_path().$destroy['edital_location'];
					unlink($storagePath);
				}
				$destroy->delete();
				return redirect()->route('admin.index');
			}
			else{
				return ('Sem autorização para deletar esta oportunidade');
			}
		}
		else{
			return redirect()->route('login');
		}		
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




	public function novaArea(){
		$areas = Area::all();
		return view('admin.nova_area', compact('areas'));
	}




	public function registerArea(Request $request)
	{
		$rules = array(
			'areaName'  => 'required|alpha_spaces|min:5',
		);


		$validator = \Validator::make(Input::all(), $rules);

		if($validator->fails())
			return redirect()->back()->withInput()->withErrors($validator->messages());


		$area = new Area();
		$area->descricao = ($request['areaName']);

		$area->save();
		return redirect()->route('admin.novaArea');
	}



	public function deletarArea($id){
		$destroy = Area::find($id);
		$destroy->delete();
		return redirect()->route('admin.novaArea');
	}



	public function editarArea(Request $id){
		$idArea = $id->input('id');		
		$editArea = Area::find($idArea);
		return $editArea->descricao;
	}



	public function updateArea(Request $req, $id){
		$dados = $req->all();
		$area = Area::find($id);
		$area['descricao'] = $dados['descricao'];
		$area->update();
		return redirect()->route('admin.novaArea');
	}



	public function novoCurso(){
		$cursos = Curso::all();
		$areas = Area::all();
		return view('admin.novo_curso', compact(['areas', 'cursos']));
	}	




	public function registerCurso(Request $request){
		$rules = array(
			'cursoName'  => 'required|alpha_spaces|min:5',
		);


		$validator = \Validator::make(Input::all(), $rules);

		if($validator->fails())
			return redirect()->back()->withInput()->withErrors($validator->messages());

		$curso            = new Curso();
		$curso->descricao = ($request['cursoName']);
		$curso->area_id   = $request['area_id'];

		$curso->save();
		return redirect()->route('admin.novoCurso');
	}



	public function deletarCurso($id){
		$destroy = Curso::find($id);
		$destroy->delete();
		return redirect()->route('admin.novoCurso');
	}


	public function updateCurso(Request $req, $id){
		$dados = $req->all();
		$curso = Curso::find($id);
		$curso['descricao'] = $dados['cursoName'];
		$curso['area_id'] = $dados['area_id'];
		$curso->update();
		return redirect()->route('admin.novoCurso');
	}

	public function editarCurso(Request $id){
		$idCurso = $id->input('id');		
		$editCurso = Curso::find($idCurso);
		$area = Area::find($editCurso['area_id']);
		$editCurso['area'] = $area['descricao'];
		return json_encode($editCurso);
	}


	public function getCursesByAreaId()
	{
		$cursosArray = array();
		$areaId = Input::get('areaId');		
		$area = Area::with('cursos')->find($areaId);
		$cursos = $area->cursos;
		foreach($cursos as $curso){
			array_push($cursosArray, $curso->descricao);
		}
		return $cursosArray;
		/*$areas = Area::with(['cursos' => function($query) use ($areaId) {
		+   		$query->where('area_id', $areaId);
		}])
		->whereHas('cursos', function($query) use ($areaId) {
		+    		$query->where('area_id', $areaId);
		})->get();*/
		//$areas  = Area::where('id', $areaId)->with('cursos')->get();
	}
	public function getOpportunitiesByText(Request $request)	{
		$searchString = $request->input('searchString');
		$opts = Oportunidade::updateOpportunitiesByText($searchString);
		return $opts;
	}
}
