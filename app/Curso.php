<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Area;

class Curso extends Model
{
	protected $fillable =
	[
		'descricao',
		'area_id'
	];
	public function getAreaName(){
		$area_name = Area::find($this->area_id);
		return $area_name['descricao'];
	}
}

