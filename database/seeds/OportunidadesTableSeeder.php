<?php

use Illuminate\Database\Seeder;

class OportunidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Oportunidade::create( [ 
    		'titulo' => 'Bolsa para a secretaria do Programa de Pós-Graduação em Ciência da computação',
    		'descricao' => 'Estão abertas as inscrições para bolsista da Secretaria Programa de Pós-Graduação em Ciência da Computação no período de 21 a 24 de agosto de 2017 até as 23h59min, devendo ser realizadas pelo endereço http://w3.ufsm.br/ppgi/bolsista/ conforme o edital.',
    		'email_contato' => 'josmar@inf.ufsm.br',
    		'email_criador' => 'teste@teste.com',
    		'carga_horaria' => '20',
    		'publicado' => 'sim',
    		'user_id' => '1',
    	] ); 
    	App\Oportunidade::create( [ 
    		'titulo' => 'Oportunidade de Bolsa - Grupo de Trabalho RNP',
    		'descricao' => 'Prezados,

    		Gostaria de anunciar a oportunidade de bolsa em projeto de pesquisa e desenvolvimento junto à Rede Nacional de Ensino e Pesquisa (RNP). O projeto tem como objetivo principal projetar, desenvolver e implantar tecnologias de rede (utilizando conceitos de virtualização) que possibilitem o surgimento de novas e sofisticadas aplicações para a Internet do Futuro.

    		Conhecimentos necessários: Python, MySQL, HTML, CSS, JavaScript, Linux;
    		Conhecimentos desejáveis: redes de computadores, inglês básico;
    		Carga Horária: 20 horas semanais presenciais a combinar;

    		Interessados enviar currículo e horários disponíveis até 25 de Agosto para <csantos@inf.ufsm.br>

    		Para maiores informações sobre o projeto, acesse <http://ufsm.br/gt-fende>.',
    		'email_contato' => 'csantos@inf.ufsm.br',
    		'email_criador' => 'teste@teste.com',
    		'carga_horaria' => '20',
    		'user_id' => '1',
    	] );
    	App\Oportunidade::create( [ 
    		'titulo' => 'DLSC - Seleção de monitores',
    		'descricao' => 'Prezado (a) aluno (a),

    		No período de 14/08 a 18/08/2017, o Departamento de Linguagens e Sistemas de Computação (DLSC) estará recebendo inscrições de candidatos à monitoria, conforme edital anexo.

    		São vagas para as disciplinas de: 
    		Laboratório de Programação I (ELC1065);
    		Estruturas de Dados "A" (ELC1066);
    		Paradigmas de Programação (ELC117);
    		Fundamentos de Banco de Dados (ELC119).
    		No ato da inscrição, os candidatos deverão apresentar Histórico Escolar (com índice de desempenho acadêmico) e cópia do RG. 

    		Valor da bolsa: R$ 250,00 (valor definido pela PRAE).' ,
    		'email_contato' => 'rejane@inf.ufsm.br',
    		'email_criador' => 'teste@teste.com',
    		'carga_horaria' => '10',
    		'publicado' => 'sim',
    		'user_id' => '1',
    	] ); 
    }
}
