<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    use HasFactory;
    protected $table = 'alumnos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nControl',
        'carrera',
        'semestre',
        'user_id'
    ];
}
