<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\Curso::create( [ 'descricao' => 'Administração',           				'area_id' => '1' ] ); //Ciências Sociais Aplicadas - 1
		App\Curso::create( [ 'descricao' => 'Agronomia',               				'area_id' => '2' ] ); //Ciências Agrárias - 2
		App\Curso::create( [ 'descricao' => 'Tecnologia em Alimentos', 				'area_id' => '2' ] );
		App\Curso::create( [ 'descricao' => 'Arquitetura e Urbanismo', 				'area_id' => '1' ] );
		App\Curso::create( [ 'descricao' => 'Arquivologia',           				'area_id' => '2' ] );
		App\Curso::create( [ 'descricao' => 'Artes Cênicas',           				'area_id' => '3' ] ); //LINGUÍSTICA, LETRAS E ARTES - 3
		App\Curso::create( [ 'descricao' => 'Ciencia da Computação',   				'area_id' => '4' ] ); //CIÊNCIAS EXATAS E DA TERRA - 4 
		App\Curso::create( [ 'descricao' => 'Ciências Biológicas',     				'area_id' => '5' ] ); //CIÊNCIAS BIOLÓGICAS - 5
		App\Curso::create( [ 'descricao' => 'Ciências Contábeis',      				'area_id' => '1' ] );
		App\Curso::create( [ 'descricao' => 'Ciências Econômicas',     				'area_id' => '1' ] );
		App\Curso::create( [ 'descricao' => 'Comunicação Social',      				'area_id' => '1' ] );
		App\Curso::create( [ 'descricao' => 'Dança',                   				'area_id' => '3' ] );
		App\Curso::create( [ 'descricao' => 'Desenho Industrial',      				'area_id' => '8' ] ); //Não Consta - 6
		App\Curso::create( [ 'descricao' => 'Educação Especial',       				'area_id' => '9' ] ); //Ciências Humanas - 7
		App\Curso::create( [ 'descricao' => 'Educação Física',         				'area_id' => '8' ] ); //Ciências da Saúde - 8
		App\Curso::create( [ 'descricao' => 'Tecnologia em Eletrônica Industrial', 	'area_id' => '6' ] );
		App\Curso::create( [ 'descricao' => 'Enfermagem',              				'area_id' => '8' ] );
		App\Curso::create( [ 'descricao' => 'Engenharia Acústica',     				'area_id' => '9' ] ); //Engenharias - 9
		App\Curso::create( [ 'descricao' => 'Engenharia Aeroespacial', 				'area_id' => '9' ] );//Não Consta. Mas deixei Engen.
		App\Curso::create( [ 'descricao' => 'Engenharia Civil',        				'area_id' => '9' ] );
		App\Curso::create( [ 'descricao' => 'Engenharia de Computação',				'area_id' => '9' ] );
		App\Curso::create( [ 'descricao' => 'Engenharia de Controle e Automação', 	'area_id' => '9' ] );
		App\Curso::create( [ 'descricao' => 'Engenharia de Produção',  				'area_id' => '9' ] );
		App\Curso::create( [ 'descricao' => 'Engenharia de Telecomunicações',  		'area_id' => '9' ] ); //Não Consta.
		App\Curso::create( [ 'descricao' => 'Engenharia Elétrica',   				'area_id' => '9' ] );
		App\Curso::create( [ 'descricao' => 'Engenharia Florestal',  				'area_id' => '2' ] );
		App\Curso::create( [ 'descricao' => 'Engenharia Mecânica',   				'area_id' => '9' ] );
		App\Curso::create( [ 'descricao' => 'Engenharia Química',    				'area_id' => '9' ] );
		App\Curso::create( [ 'descricao' => 'Engenharia Sanitária e Ambiental', 	'area_id' => '9' ] );
		App\Curso::create( [ 'descricao' => 'Estatística', 							'area_id' => '4' ] );
		App\Curso::create( [ 'descricao' => 'Tecnologia em Fabricação Mecânica', 	'area_id' => '9' ] ); //Engenharias??
		App\Curso::create( [ 'descricao' => 'Farmácia',                             'area_id' => '8' ] );
		App\Curso::create( [ 'descricao' => 'Filosofia',                            'area_id' => '7' ] );
		App\Curso::create( [ 'descricao' => 'Física',                               'area_id' => '4' ] );
		App\Curso::create( [ 'descricao' => 'Fisioterapia',                         'area_id' => '8' ] );
		App\Curso::create( [ 'descricao' => 'Fonoaudiologia',                       'area_id' => '8' ] );
		App\Curso::create( [ 'descricao' => 'Geografia',                            'area_id' => '7' ] );
		App\Curso::create( [ 'descricao' => 'Tecnologia de Geoprocessamento',       'area_id' => '4' ] );
		App\Curso::create( [ 'descricao' => 'Tecnologia em Gestão de Cooperativas', 'area_id' => '2' ] );
		App\Curso::create( [ 'descricao' => 'História',                             'area_id' => '7' ] );
		App\Curso::create( [ 'descricao' => 'Letras',                               'area_id' => '3' ] );
		App\Curso::create( [ 'descricao' => 'Matemática',                           'area_id' => '4' ] );
		App\Curso::create( [ 'descricao' => 'Medicina',                             'area_id' => '8' ] );
		App\Curso::create( [ 'descricao' => 'Medicina Veterinária',                 'area_id' => '2' ] );
		App\Curso::create( [ 'descricao' => 'Meteorologia',                         'area_id' => '4' ] );
		App\Curso::create( [ 'descricao' => 'Música',                               'area_id' => '6' ] );// 3?
		App\Curso::create( [ 'descricao' => 'Música e Tecnologia',					'area_id' => '3' ] );
		App\Curso::create( [ 'descricao' => 'Odontologia',						    'area_id' => '8' ] );//*
		App\Curso::create( [ 'descricao' => 'Tecnologia em Processos Químicos',		'area_id' => '4' ] );
		App\Curso::create( [ 'descricao' => 'Psicologia',							'area_id' => '7' ] );
		App\Curso::create( [ 'descricao' => 'Química',								'area_id' => '4' ] );
		App\Curso::create( [ 'descricao' => 'Química Industrial',					'area_id' => '4' ] );
		App\Curso::create( [ 'descricao' => 'Redes de Computadores',				'area_id' => '4' ] );
		App\Curso::create( [ 'descricao' => 'Relações Internacionais',				'area_id' => '7' ] );
		App\Curso::create( [ 'descricao' => 'Serviço Social',						'area_id' => '1' ] );
		App\Curso::create( [ 'descricao' => 'Sistemas de Informação',				'area_id' => '4' ] );
		App\Curso::create( [ 'descricao' => 'Sistemas para Internet',				'area_id' => '4' ] );
		App\Curso::create( [ 'descricao' => 'Teatro',								'area_id' => '3' ] );
		App\Curso::create( [ 'descricao' => 'Terapia Ocupacional',					'area_id' => '8' ] );
		App\Curso::create( [ 'descricao' => 'Zootecnia',							'area_id' => '2' ] );

		

    }
}
