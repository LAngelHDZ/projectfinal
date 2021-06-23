<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_materias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id');
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            $table->char('grupo');
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
        Schema::dropIfExists('horaio_materias');
    }
}
