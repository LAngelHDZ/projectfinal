<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docente extends Model
{
    use HasFactory;
    protected $table = 'docentes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'matricula',
        'RFC',
        'user_id'
    ];
}
