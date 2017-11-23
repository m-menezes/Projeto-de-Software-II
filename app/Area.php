<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function cursos()
    {
    	return $this->hasMany('App\Curso');
    }
}
