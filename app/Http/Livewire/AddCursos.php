<?php

namespace App\Http\Livewire;

use App\Models\alumno;
use App\Models\horario_alumno;
use App\Models\horario_materia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AddCursos extends Component
{
    public $cursos, $horarios, $horario_a, $user,$alumno;
    public $idC, $idA, $add=0;

    protected $listeners = ['render','store'];
    public function render()
    {
            $this->showcursos();
            return view('livewire.add-cursos');
    }

    public function showcursos(){
        $this->user=Auth::user()->id;
        $this->alumno = alumno::join('users','users.id','=','alumnos.user_id')
    ->select('alumnos.id','alumnos.carrera','alumnos.semestre',)
    ->where('user_id',$this->user)->get();

    $this->cursos = horario_materia::join('docentes','horario_materias.docente_id','=','docentes.id')
    ->join('materias','horario_materias.materia_id','=','materias.id')
    ->join('users','users.id','=','docentes.user_id')
    ->select('horario_materias.id','materias.id as materia_id',
            'materias.materia','users.name','users.apellidoP','users.apellidoM'
    )
    ->where('materias.categoria',$this->alumno[0]->carrera)
    ->where('materias.semestre',$this->alumno[0]->semestre)
    ->orderBy('horario_materias.id','asc')->get();

    $this->horarios = horario_materia::join('materias','horario_materias.materia_id','=','materias.id')
    ->join('horario_dias','horario_dias.horarioM_id','=','horario_materias.id')
    ->select('horario_materias.id as id_curso','horario_dias.id','horario_dias.horarioM_id','horario_dias.hora','horario_dias.dia','horario_dias.aula')
    ->where('materias.categoria',$this->alumno[0]->carrera)
    ->where('materias.semestre',$this->alumno[0]->semestre)
    ->orderBy('horario_dias.id','asc')->get();

    $this->horario_a =horario_alumno::select('id','horarioM_id','alumno_id')->get();

    }
    
    public function store($idC){
        $alumnoid=$this->alumno[0]->id;

        $idcurso=horario_alumno::select('horarioM_id')->latest('id')->first();
        $matid= horario_materia::select('materia_id')
        ->where('id',$idcurso)->get();

        $alum=horario_alumno::join('horario_materias','horario_materias.id','=','horario_alumnos.horarioM_id')
        ->where('horario_alumnos.alumno_id',$alumnoid)
        // ->where('horario_materias.materia_id',$matid)
        ->count();
        $materia=horario_alumno::join('horario_materias','horario_materias.id','=','horario_alumnos.horarioM_id')
        // ->where('horario_alumnos.alumno_id',$alumnoid)
        ->where('horario_materias.materia_id',1)
        ->count();
        // $horarioE= horario_alumno::join('horario_materias','horario_alumnos.horarioM_id','=','horario_materias.id')
        // ->where('horario_alumnos.horarioM_id',$idC)
        // ->where('horario_alumnos.alumno_id',$this->alumno[0]->id) 
        // ->count();
        $horarioE= horario_alumno::where('horarioM_id',$idC)
        ->where('alumno_id', $alumnoid) 
        ->count();
            
        if($horarioE==1){
           
                // $this->emit('alert','No puede agregar esta materia por que ya esta en su horario');
            
                $this->emit('alert','No puede agregar esta materia por que ya esta en su horario');
            
        }else if($materia==1 && $alum==1){

            $this->emit('alert','No puede agregar esta materia por que ya esta en su horario');
        }else{
            $horario_a= new horario_alumno();
            $horario_a->horarioM_id=$idC;
            $horario_a->alumno_id=$alumnoid;
            $horario_a->status=1;
            $horario_a->save();
            $this->emit('alert','Materia agregada exitosamente');
           
        }
    }
    
}

