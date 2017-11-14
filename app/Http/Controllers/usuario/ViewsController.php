<?php

namespace App\Http\Controllers\usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oportunidade;
use App\Area;

class ViewsController extends Controller
{
	public function home()
	{		
		$registros = Oportunidade::all();
		$areas     = \App\Area::orderBy('descricao', 'asc')->get();
		return view('index', compact(['registros', 'areas']));
	}

	public function getOportunidadesByText(Request $request) {
		$search = $request->input('searchString');
		$registros = Oportunidade::where('descricao', 'like', '%' .$search . '%')->get();
		$areas     = \App\Area::orderBy('descricao', 'asc')->get();
		return view('index', compact(['registros', 'areas']));	
	}

	public function teste()
	{
		$areas = Area::with('cursos')->get();
		echo '<ul>';
		foreach($areas as $area)
		{
			echo '<li>' . $area->id . '-' . $area->descricao .'</li>';
			echo '<ul>';
			foreach($area->cursos as $curso)
			{
				echo '<li>' . $curso->descricao . '</li>';
			}
			echo '</ul>';

		}
		echo '</ul>';
		return('');
	}

	public function postagem($id)
	{
		$registro = Oportunidade::find($id);
		return view('postagem', compact('registro'));
	}
	
	public function sobre()
	{
		return view('sobre');
	}
}
