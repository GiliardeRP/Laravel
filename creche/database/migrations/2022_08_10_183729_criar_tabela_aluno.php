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
        Schema::create('pessoa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricula');
            $table->string('nome');
            $table->string('cpf');
            $table->string('endereco');
            $table->string('tipo');
            $table->integer('idade');
            $table->float('salario');
            $table->boolean('participa')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pessoa');
        //
    }
};
