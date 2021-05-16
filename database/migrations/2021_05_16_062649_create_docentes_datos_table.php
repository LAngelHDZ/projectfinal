<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes_datos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id');
            $table->string('lugarNac',50);
            $table->date('fechaNac');
            $table->enum('genero',['masculino','femenino']);
            $table->string('estudios',50);
            $table->string('direccion',50);
            $table->string('colonia',50);
            $table->string('ciudad',50);
            $table->string('telefono',15);
            $table->string('cp',20);
            $table->foreign('docente_id')->references('id')->on('docentes');
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
        Schema::dropIfExists('docentes_datos');
    }
}
