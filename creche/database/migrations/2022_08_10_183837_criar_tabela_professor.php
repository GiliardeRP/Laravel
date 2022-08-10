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

        Schema::create('professor', function(Blueprint $table){

            $table->bigIncrements('id');
            $table->string('matricula');
            $table->string('nome');
            $table->string('cpf');
            $table->string('endereco');

            $table->integer('idade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('professor');
    }
};
