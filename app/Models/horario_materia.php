<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario_materia extends Model
{
    use HasFactory;
    protected $table = 'horario_materias';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'docente_id',
        'materia_id'
    ];
}
