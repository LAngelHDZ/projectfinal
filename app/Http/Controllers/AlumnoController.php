<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\horario_alumno;
use App\Models\horario_materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumnoController extends Controller
{
    public function cursoA(){
        
    return view('alumno.addcurso');

    }

    public function cursoAdd(Request $request){
    //     $horario_a= new horario_alumno();
    //     $horario_a->horarioM_id=$request->idC;
    //     $horario_a->alumno_id=$request->idA;
    //     $horario_a->save();

    // $alumno = alumno::join('users','users.id','=','alumnos.user_id')
    // ->select('alumnos.id','alumnos.carrera','alumnos.semestre',)
    // ->where('user_id',$user)->get();

    // $cursos = horario_materia::join('docentes','horario_materias.docente_id','=','docentes.id')
    // ->join('materias','horario_materias.materia_id','=','materias.id')
    // ->join('users','users.id','=','docentes.user_id')
    // ->select('horario_materias.id','materias.id as materia_id',
    //         'materias.materia','users.name','users.apellidoP','users.apellidoM'
    // )
    // ->where('materias.categoria',$alumno[0]->carrera)
    // ->where('materias.semestre',$alumno[0]->semestre)
    // ->orderBy('horario_materias.id','asc')->get();

    // $horarios = horario_materia::join('materias','horario_materias.materia_id','=','materias.id')
    // ->join('horario_dias','horario_dias.horarioM_id','=','horario_materias.id')
    // ->select('horario_materias.id as id_curso','horario_dias.id','horario_dias.horarioM_id','horario_dias.hora','horario_dias.dia','horario_dias.aula')
    // ->where('materias.categoria',$alumno[0]->carrera)
    // ->where('materias.semestre',$alumno[0]->semestre)
    // ->orderBy('horario_dias.id','asc')->get(); 
    
    //     $horario_a =horario_alumno::select('id','horarioM_id','alumno_id')
    //                     ->where('horarioM_id',$request->idC)
    //                     ->where('alumno_id',$request->idA)->get();
    //     return view('alumno.addcurso',compact('horario_a'));
    }
}
