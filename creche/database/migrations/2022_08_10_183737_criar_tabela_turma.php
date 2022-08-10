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
        Schema::create('turma', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('materia');
            $table->string('periodo');

            $table->integer('id_professor');
            $table->foreign('id_professor')->references('id')->on('professor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('turma');

    }
};
