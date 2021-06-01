<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\alumno;
use App\Models\docente;
use App\Models\horario_dia;
use App\Models\horario_materia;
use App\Models\materia;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //metodod main panel

    public function main(){
        return view('admin.panel');
    }

    //metodos crud de alumnos
    public function alumno(){
       $alumno = User::join('alumnos','users.id','=','alumnos.user_id')
       ->select('users.id','users.name as nombre','users.apellidoP','users.apellidoM','alumnos.id as id_alumno','alumnos.matricula','alumnos.carrera','alumnos.semestre')->orderBy('alumnos.id','asc')->get();
        return view('admin.alumno',compact('alumno'));

    }

    public function registraralumno(){
        return view('admin.registraralumno');
    }

    public function registroA(Request $request){

        $user= new User();
        $data = [
            "name" => $request->nombre,
            "apellidoP" => $request->ap,
            "apellidoM" => $request->am,
            "email" => $request->email,
            "password" => $request->password,
            "type_user" => 1
        ];
             User::create([
            'name' => $data['name'],
            'apellidoP' => $data['apellidoP'],
            'apellidoM' => $data['apellidoM'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type_user'=> $data['type_user'],
        ]);

        $user = User::select('id')->latest('id')->first();
        $alumno= new alumno();
        $alumno->matricula=$request->matricula;
        $alumno->carrera=$request->carrera;
        $alumno->semestre=$request->semestre;
        $alumno->user_id=$user->id;
        $alumno->save();
        return redirect()->route('alumno');
    }

    public function updatealumno($id){
        $id_U=alumno::select('user_id')->where('id',$id)->get();
        $alumno=alumno::findOrFail($id);
        $user=user::findOrFail($id_U);

        return view('admin.updatealumno',compact('alumno','user'));
    }

    public function updateA(Request $request){
        // $alumno= new alumno();
        // $user= new User();
        $idU=$request->idU;
        $idA=$request->idA;
        // $id_A=alumno::join('users','users.id','=','alumnos.user_id')
        // ->select('alumnos.id',)->where('user_id',$id)->get();
        $alumno=alumno::findOrFail($idA);
        $user=user::findOrFail($idU);
        $user->name=$request->input('nombre');
        $user->apellidoP=$request->input('ap');
        $user->apellidoM=$request->input('am');
        $user->email=$request->input('email');
        
        $alumno->matricula=$request->input('matricula');
        $alumno->carrera=$request->input('carrera');
        $alumno->semestre=$request->input('semestre');

        $user->update();
        $alumno->update();

        return redirect()->route('alumno');
            
    }

    public function destroyA(Request $request){
        $idU=$request->idU;
        $idA=$request->idA;
        // $id_U=alumno::select('user_id')->where('id',$id)->get();
        $alumno=alumno::findOrFail($idA);

        $user=user::findOrFail($idU);
        $alumno->delete();
        $user->delete();
        return redirect()->route('alumno');
    }

//Metodos para los profesores
    public function docente(){
        $docentes = User::join('docentes','users.id','=','docentes.user_id')
       ->select('users.id as id_user','users.name as nombre','users.apellidoP','users.apellidoM','docentes.id','docentes.matricula','docentes.rfc')->orderBy('docentes.id','asc')->get();
        return view('admin.docente',compact('docentes'));
       
    }

    public function registrardocente(){
        return view('admin.registrardocente');
    }

    public function registroD(Request $request){

        $user= new User();
        $data = [
            "name" => $request->nombre,
            "apellidoP" => $request->ap,
            "apellidoM" => $request->am,
            "email" => $request->email,
            "password" => $request->password,
            "type_user" => 2
        ];
             User::create([
            'name' => $data['name'],
            'apellidoP' => $data['apellidoP'],
            'apellidoM' => $data['apellidoM'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type_user'=> $data['type_user'],
        ]);


        $user = User::select('id')->latest('id')->first();
        $alumno= new docente();
        $alumno->matricula=$request->matricula;
        $alumno->rfc=$request->rfc;
        $alumno->user_id=$user->id;
        $alumno->save();
        return redirect()->route('docente');
    }

    public function updatedocente($id){
        $id_U=docente::select('user_id')->where('id',$id)->get();
        $docente=docente::findOrFail($id);
        $user=user::findOrFail($id_U);

        return view('admin.updatedocente',compact('docente','user'));
    }

    public function updateD(Request $request){
        // $alumno= new alumno();
        // $user= new User();
        $idU=$request->idU;
        $idD=$request->idD;
        // $id_A=alumno::join('users','users.id','=','alumnos.user_id')
        // ->select('alumnos.id',)->where('user_id',$id)->get();
        $docente=docente::findOrFail($idD);
        $user=user::findOrFail($idU);
        $user->name=$request->input('nombre');
        $user->apellidoP=$request->input('ap');
        $user->apellidoM=$request->input('am');
        $user->email=$request->input('email');
        
        $docente->matricula=$request->input('matricula');
        $docente->RFC=$request->input('rfc');


        $user->update();
        $docente->update();

        return redirect()->route('docente');
            
    }

    public function destroyD(Request $request){
        $idU=$request->idU;
        $idD=$request->idD;
        // $id_U=alumno::select('user_id')->where('id',$id)->get();
        $docente=docente::findOrFail($idD);

        $user=user::findOrFail($idU);
        $docente->delete();
        $user->delete();
        return redirect()->route('docente');
    }
   

//metodos de agregar materias

public function materia(){
    $materias = materia::select('id','materia','descripcion','categoria','semestre')->orderBy('id','asc')->get();
    return view('admin.materia',compact('materias'));
}

public function registrarmateria(){  
     return view('admin.registrarmateria'); 
}

public function registroM(Request $request){
  $materia=new materia();
    $materia->materia=$request->materia;
    $materia->descripcion=$request->descripcion;
    $materia->categoria=$request->carrera;
    $materia->semestre=$request->semestre;
    $materia->save();
    return redirect()->route('materia');
}

public function updatemateria($id){
    $materia=materia::select('id','materia','descripcion','categoria','semestre')->where('id',$id)->get();
    return view('admin.updatemateria',compact('materia'));
}

public function updateM(Request $request, $id){
    
    $materia=materia::findOrFail($id);
    $materia->materia=$request->input('materia');
    $materia->descripcion=$request->input('descripcion');
    $materia->categoria=$request->input('carrera');
    $materia->semestre=$request->input('semestre');
    $materia->update();
    return redirect()->route('materia');   
}

public function destroyM(Request $request){
    $idM=$request->idM;
    $materia=materia::findOrFail($idM);
    $materia->delete();
    return redirect()->route('materia');
}

//metodos crud cursos 

public function curso(){
    $cursos = horario_materia::join('docentes','horario_materias.docente_id','=','docentes.id')
    ->join('materias','horario_materias.materia_id','=','materias.id')
    ->join('users','users.id','=','docentes.user_id')
    ->select('horario_materias.id','docentes.id as docente_id','materias.id as materia_id','materias.materia','materias.categoria','users.name','users.apellidoP','users.apellidoM')
    ->orderBy('horario_materias.id','asc')->get();
    return view('admin.curso',compact('cursos'));
}

public function registrarcurso(){ 
    
    $materias=materia::select('id','materia','semestre')->orderBy('id','asc')->get();
    $docentes=docente::join('users','users.id','=','docentes.user_id')
    ->select('users.id','users.name','users.apellidoP','users.apellidoM','docentes.id as docente_id','docentes.user_id')
    ->orderBy('docentes.id','asc')->get();
     return view('admin.registrarcurso',compact('materias','docentes')); 
}

public function registroC(Request $request){
  $curso=new horario_materia();
    $curso->docente_id=$request->docente;
    $curso->materia_id=$request->materia;
    $curso->save();
    return redirect()->route('curso');
}

public function updatecurso($id){
    $materias=materia::select('id','materia','semestre')->orderBy('id','asc')->get();
    $docentes=docente::join('users','users.id','=','docentes.user_id')
    ->select('users.id','users.name','users.apellidoP','users.apellidoM','docentes.id as docente_id','docentes.user_id')
    ->orderBy('docentes.id','asc')->get();
    $curso = horario_materia::join('docentes','horario_materias.docente_id','=','docentes.id')
    ->join('materias','horario_materias.materia_id','=','materias.id')
    ->join('users','users.id','=','docentes.user_id')
    ->select('horario_materias.id','horario_materias.docente_id','horario_materias.materia_id','materias.materia','users.name','users.apellidoP','users.apellidoM')
    ->where('horario_materias.id',$id)->get();
    
    return view('admin.updatecurso',compact('materias','docentes','curso'));
}

public function updateC(Request $request, $id){
    
    $curso=horario_materia::findOrFail($id);
    $curso->docente_id=$request->input('docente');
    $curso->materia_id=$request->input('materia');
    $curso->update();
    return redirect()->route('curso');   
}

public function destroyC(Request $request){
    $idM=$request->idC;
    $curso=horario_materia::findOrFail($idM);
    $curso->delete();
    return redirect()->route('curso');
}

//metodos crud de horarios
public function horario($id){
    $horarios = horario_materia::join('materias','horario_materias.materia_id','=','materias.id')
    ->join('horario_dias','horario_dias.horarioM_id','=','horario_materias.id')
    ->select('horario_materias.id as id_curso','horario_dias.id','horario_dias.horarioM_id','materias.materia','horario_dias.hora','horario_dias.dia','horario_dias.aula')
    ->where('horario_dias.horarioM_id',$id)->orderBy('horario_dias.id','asc')->get();
    return view('admin.horario',compact('horarios','id'));
}

public function registrarhorario($id){ 
    
     return view('admin.registrarhorario',compact('id')); 
}

public function registroH(Request $request){
  $horario=new horario_dia();
    $horario->hora=$request->hora;
    $horario->dia=$request->dia;
    $horario->aula=$request->aula;
    $horario->horarioM_id=$request->id;
    $horario->save();
    
    $alert="Horario agregado";
    return back();
    
}

public function updatehorario($id){
    $materias=materia::select('id','materia','semestre')->orderBy('id','asc')->get();
    $docentes=docente::join('users','users.id','=','docentes.user_id')
    ->select('users.id','users.name','users.apellidoP','users.apellidoM','docentes.id as docente_id','docentes.user_id')
    ->orderBy('docentes.id','asc')->get();
    $curso = horario_materia::join('docentes','horario_materias.docente_id','=','docentes.id')
    ->join('materias','horario_materias.materia_id','=','materias.id')
    ->join('users','users.id','=','docentes.user_id')
    ->select('horario_materias.id','horario_materias.docente_id','horario_materias.materia_id','materias.materia','users.name','users.apellidoP','users.apellidoM')
    ->where('horario_materias.id',$id)->get();
    
    return view('admin.updatecurso',compact('materias','docentes','curso'));
}

public function updateH(Request $request, $id){
    
    $curso=horario_materia::findOrFail($id);
    $curso->docente_id=$request->input('docente');
    $curso->materia_id=$request->input('materia');
    $curso->update();
    return redirect()->route('curso');   
}

public function destroyH(Request $request){
    $idM=$request->idC;
    $curso=horario_materia::findOrFail($idM);
    $curso->delete();
    return redirect()->route('curso');
}

//metodos admin
    public function admin(){
        return view('auth.register');
    }

   
    
}
