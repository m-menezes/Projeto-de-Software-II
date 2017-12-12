<?php

namespace App\Http\Controllers\usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Oportunidade;
use App\Area;
use App\Curso;
use Auth;
use Validator;
use flash;
use DB;
class ViewsController extends Controller
{
	public function home(){
		$registros = Oportunidade::where('publicado', 'sim')->orderBy('updated_at', 'DESC')->paginate(5);
		$areas     = Area::orderBy('descricao', 'DESC')->get();
        $cursos     = Curso::orderBy('descricao', 'DESC')->get();
        return view('index', compact(['registros', 'areas', 'cursos']));
	}
    public function getOportunidadesByText(Request $request) {
        DB::enableQueryLog();
        $search = $request->input('searchString');
        $areas = '';
        if( empty( $search) || $search == '') {
            $registros = Oportunidade::where('publicado', 'sim')->orderBy('updated_at', 'DESC')->paginate(5);
            $areas     = \App\Area::orderBy('descricao', 'asc')->get();
        }
        else
        {            
            $registros = Oportunidade::where('publicado', 'sim')->where(function ($q) use($search){
                    return $q->where('titulo', 'like', '%' .$search . '%')                    
                    ->orwhere('email_contato', 'like', '%' .$search . '%')
                    ->orwhere('email_criador', 'like', '%' .$search . '%')
                    ->orwhere('descricao', 'like', '%' .$search . '%');
                })->paginate(5);
                //dd( DB::getQueryLog());
            $areas     = \App\Area::orderBy('descricao', 'asc')->get();
        }
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

	public function postagem($id){
        $registro = Oportunidade::find($id);
		$areas = Area::all();
		return view('postagem', compact('registro','areas'));
	}
	
	public function sobre(){
		return view('sobre');
	}

	public function edit_pass(){
        return view('auth.edit_pass', array('user'=> Auth::user()));
    }
    public function edit_pass_update(Request $request){

        $input = $request->all();
        $user = Auth::user();
        if (! Hash::check($input['password_old'],Auth::user()->password)){
                return redirect()   ->route('edit_pass')
                                    ->withErrors(['password' => 'Senha atual está incorreta'])
                                    ->withInput();
        }
        /*Validar password/email*/
        $validator = Validator::make($request->all(), [
            'password'              => ["required"],
            'password_confirmation' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect()   ->route('edit_pass')
                                ->withErrors($validator)
                                ->withInput();
        }
        $input['password'] = bcrypt($input['password']);//criptografa password
        $user->update($input); //salva novos dados
        return redirect()->route('edit_pass');
    }
    public function edit_name(){
        return view('auth.edit_name', array('user'=> Auth::user()));
    }
    public function edit_name_update(Request $request){
        $input = $request->all();
        $user = Auth::user();
        $file = $request->file('foto');
        if($file != NULL){
            $storagePath = storage_path().'/app/public/fotos/';
            if($user->foto){
                unlink($storagePath.$user->foto);
                $user->foto == NULL;
            }
            $fileName = time(). '.' .$file->getClientOriginalExtension();
            $file->move($storagePath, $fileName);
            $input['foto'] = $fileName;
        }
        $user->update($input);
        return redirect()->route('edit_name');
    }
}
