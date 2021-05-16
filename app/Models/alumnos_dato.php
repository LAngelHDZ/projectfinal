<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumnos_dato extends Model
{
    use HasFactory;
    protected $table = 'alumnos_datos';

    protected $fillable = [
        'id',
        'alumno_id',
        'lugarNac',
        'fechaNac',
        'genero',
        'direccion',
        'colonia',
        'ciudad',
        'cp',
        'telefono'
    ];
}
