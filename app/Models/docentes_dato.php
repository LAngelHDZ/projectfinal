<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docentes_dato extends Model
{
    use HasFactory;
    protected $table = 'alumnos_datos';

    protected $fillable = [
        'id',
        'docente_id',
        'lugarNac',
        'fechaNac',
        'genero',
        'direccion',
        'colonia',
        'ciudad',
        'cp',
        'telefono',
        
    ];
}
