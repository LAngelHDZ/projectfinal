<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_datos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->string('lugarNac',50);
            $table->date('fechaNac');
            $table->enum('genero',['masculino','femenino']);
            $table->string('direccion',50);
            $table->string('colonia',50);
            $table->string('ciudad',50);
            $table->string('cp',10);
            $table->string('telefono',10);
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
        Schema::dropIfExists('alumnos_datos');
    }
}
