<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario_dia extends Model
{
    use HasFactory;
    protected $table = 'horario_dias';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'hora',
        'dia',
        'aula',
        'horarioM_id'
    ];
}
