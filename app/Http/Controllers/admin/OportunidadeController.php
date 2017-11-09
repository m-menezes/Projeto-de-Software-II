<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Oportunidade;
use App\Area;
use Input;

class OportunidadeController extends Controller
{

	public function index()
	{
		$registros = Oportunidade::orderBy('created_at', 'DESC')->get();
		$areas = Area::orderBy('descricao', 'ASC')->get();
		return view('admin.index', compact( ['registros', 'areas'] ));
	}


	public function loadchart()
	{
		$registros = Oportunidade::orderBy('created_at', 'DESC')->get();
		$publicados = (Oportunidade::where('publicado','sim')->count());
		$naopublicados = (Oportunidade::where('publicado','nao')->count());
		$postagens = count($registros);
		return(compact('postagens','publicados', 'naopublicados'));
	}


	public function adicionar()
	{
		$areas = \App\Area::all();
      return view('admin.adicionar', compact('areas'));
   }


	public function salvar(Request $req)
	{
	  $dados = $req->all();

	  if(isset($dados['publicado']))
	  {
	      $dados['publicado']    = 'sim';
	  }
	  else
	      $dados['publicado']    = 'nao';
	  Oportunidade::create($dados);
	  return redirect()->route('admin.index');
	}


	public function editar($id)
	{
		$registro = Oportunidade::find($id);
		return view('admin.editar', compact('registro'));
	}


	public function atualizar(Request $req, $id)
	{
		$dados = $req->all();

		if(isset($dados['publicado']))
		{
			$dados['publicado']	= 'sim';
		}
		else
			$dados['publicado']	= 'nao';
		Oportunidade::find($id)->update($dados);
		return redirect()->route('admin.index');
	}


	public function deletar($id)
	{
		Oportunidade::find($id)->delete();
		return redirect()->route('admin.index');		
	}


	public function publicado(Request $id)
	{
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


	public function novaArea()
	{
		return view('admin.nova_area');
	}

	public function getCursesByAreaId()
	{
		$cursosArray = array();
		$areaId = Input::get('areaId');		
		$area = Area::with('cursos')->find($areaId);
		$cursos = $area->cursos;
		foreach($cursos as $curso)
		{
			array_push($cursosArray, $curso->descricao);
		}
		return $cursosArray;
		/*$areas = Area::with(['cursos' => function($query) use ($areaId) {
   		$query->where('area_id', $areaId);
		}])
		->whereHas('cursos', function($query) use ($areaId) {
    		$query->where('area_id', $areaId);
		})->get();*/
		//$areas  = Area::where('id', $areaId)->with('cursos')->get();
		
		
	}

	public function registerArea(Request $request)
	{
        $rules = array(
            'areaName'  => 'required|alpha_spaces|min:5',
        );
        

        $validator = \Validator::make(Input::all(), $rules);

        if($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator->messages());
                

        $area = new \App\Area();
        $area->descricao = strtoupper($request['areaName']);
                
        $area->save();
        return redirect()->route('home');
	}

	public function novoCurso()
	{
		$areas = \App\Area::all();
		return view('admin.novo_curso', compact('areas'));
	}	


	public function registerCurso(Request $request) {
		$rules = array(
		   'cursoName'  => 'required|alpha_spaces|min:5',
		);


		$validator = \Validator::make(Input::all(), $rules);

		if($validator->fails())
		   return redirect()->back()->withInput()->withErrors($validator->messages());
         
		$curso            = new \App\Curso();
		$curso->descricao = strtoupper($request['cursoName']);
		$curso->area_id   = $request['area_id'];
                
		$curso->save();
		return redirect()->route('home');
	}

	public function getOpportunitiesByText(Request $request)	{
		//Oportunidade::updateOpportunitiesByText( Input:get('searchString') );
		dd($request);
	}
}
