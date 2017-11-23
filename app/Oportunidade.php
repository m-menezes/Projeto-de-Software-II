<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oportunidade extends Model
{
    protected $fillable = [
        'titulo', //Titulo
        'descricao', // Pré-requisitos, atividades, duração
        'email_contato', //email de contato
        'email_criador', //email criador, salvo altomaticamente
        'local', //centro, empresa, local da bolsa
        'edital', //se possuir pdf
        'area', // area de atuação
        'remuneracao', //remuneração
        'edital_extension', //mymetype arquivo
        'carga_horaria', //carga horaria semanal
        'publicado', //publicação da postagem
        'expira', //data de expiração da postagem
        'user_id',
        'edital_location', // se possuir pdf

    ];
    /**
	* Recebe uma string e traz todas as oportunidades que contenham aquela string
	*/
    public static function updateOpportunitiesByText($search)	{
    	$result = Oportunidade::where('descricao', 'like', '%' .$search . '%')->get();
    	return $result;
    }   
}