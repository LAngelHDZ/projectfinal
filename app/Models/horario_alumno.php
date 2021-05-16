<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario_alumno extends Model
{
    use HasFactory;
    protected $table = 'horario_alumnos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'horarioM_id',
        'alumno_id'
    ];
}
