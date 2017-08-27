<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oportunidade extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'publicado', 'email', 'carga_horaria', 'valor', 'criado', 'centro',
    ];
}
