<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Area::create( [ 'descricao' => 'CIÊNCIAS SOCIAIS APLICADAS' ] ); //1
    	App\Area::create( [ 'descricao' => 'CIÊNCIAS AGRÁRIAS' ] ); //2
    	App\Area::create( [ 'descricao' => 'LINGUÍSTICA, LETRAS E ARTES' ] ); //3
    	App\Area::create( [ 'descricao' => 'CIÊNCIAS EXATAS E DA TERRA' ] ); //4
    	App\Area::create( [ 'descricao' => 'CIÊNCIAS BIOLÓGICAS' ] ); //5    	
    	App\Area::create( [ 'descricao' => 'NÃO CONSTA' ] ); //6
    	App\Area::create( [ 'descricao' => 'CIÊNCIAS HUMANAS' ] ); //7
    	App\Area::create( [ 'descricao' => 'CIÊNCIAS DA SAÚDE' ] ); //8
    	App\Area::create( [ 'descricao' => 'ENGENHARIA' ] ); //9
    }
}
