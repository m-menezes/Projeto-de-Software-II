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
    	App\Area::create( [ 'descricao' => 'Ciências Sociais Aplicadas' ] );       //1
    	App\Area::create( [ 'descricao' => 'Ciências Agrárias' ] );                //2
    	App\Area::create( [ 'descricao' => 'Linguística, Letras E Artes' ] );      //3
    	App\Area::create( [ 'descricao' => 'Ciências Exatas e da Terra' ] );       //4
    	App\Area::create( [ 'descricao' => 'Ciências Biológicas' ] );              //5    	
    	App\Area::create( [ 'descricao' => 'Não Consta' ] );                       //6
    	App\Area::create( [ 'descricao' => 'Ciências Humanas' ] );                 //7
    	App\Area::create( [ 'descricao' => 'Ciências da Saúde' ] );                //8
    	App\Area::create( [ 'descricao' => 'Engenharia' ] );                       //9
    }
}
