<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOportunidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('oportunidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');                                   // Titulo
            $table->string('descricao');                                // Pré-requisitos, atividades, duração
            $table->string('email_contato');                            // email de contato
            $table->string('email_criador');                            // email criador, salvo altomaticamente
            $table->string('local')->nullable();                        // centro, empresa, local da bolsa (CHAVE DA OUTRA TABELA)
            $table->string('edital')->nullable();                       // se possuir pdf
            $table->string('edital_location')->nullable();              // se possuir pdf
            $table->string('edital_extension')->nullable();             // se possuir pdf salva extensão para visualização na tela da postagem (PDF/JPG)
            $table->string('area')->nullable();                         // area de atuação
            $table->date('expira')->nullable();                        // data de expiração da postagem
            $table->integer('remuneracao')->nullable();                 // remuneração do bolsista
            $table->string('carga_horaria')->nullable();                            // carga horaria semanal
            $table->enum('publicado',['sim','nao'])->default('nao');    // publicação da postagem
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('oportunidades');
    }
}
