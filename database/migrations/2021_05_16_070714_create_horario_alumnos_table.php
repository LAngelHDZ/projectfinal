<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_alumnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('horarioM_id');
            $table->foreign('horarioM_id')->references('id')->on('horario_materias');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('status');   
            $table->foreign('alumno_id')->references('id')->on('alumnos'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario_alumnos');
    }
}
