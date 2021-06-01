<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_dias', function (Blueprint $table) {
            $table->id();
            $table->time('hora');
            $table->String('dia');
            $table->String('aula');
            $table->unsignedBigInteger('horarioM_id');
            $table->foreign('horarioM_id')->references('id')->on('horario_materias')->onDelete('cascade');
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
        Schema::dropIfExists('horario_dias');
    }
}
