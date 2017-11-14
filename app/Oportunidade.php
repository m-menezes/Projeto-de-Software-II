<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oportunidade extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'publicado', 'email', 'carga_horaria', 'valor', 'criado', 'centro',
    ];

   /**
	* Recebe uma string e traz todas as oportunidades que contenham aquela string
	*/
    public static function updateOpportunitiesByText($search)	{
    	$result = Oportunidade::where('descricao', 'like', '%' .$search . '%')->get();
    	return $result;
    }   
}
