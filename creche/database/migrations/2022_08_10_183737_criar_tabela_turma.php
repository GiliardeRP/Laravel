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
        Schema::create('turma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identificador');
            $table->string('materia');
            $table->string('periodo');

            // $table->foreignId('pessoa_id')->constrained()->onDelete('cascade');

            // $table->integer('pessoa_id');
            // $table->foreign('pessoa_id')
            // ->references('id')
            // ->on('pessoa')->onDelete('cascade');

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
