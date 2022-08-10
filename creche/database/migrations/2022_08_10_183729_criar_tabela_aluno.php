<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('matricula');
            $table->string('nome');
            $table->string('cpf');
            $table->string('endereco');
            $table->integer('idade');

            $table->integer('id_turma');
            $table->foreign('id_turma')->references('id')->on('turma');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aluno');
        //
    }
};
