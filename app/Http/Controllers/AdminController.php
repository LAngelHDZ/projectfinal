<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\alumno;
use App\Models\docente;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //

    public function alumno(){
       $alumno = User::join('alumnos','users.id','=','alumnos.user_id')
       ->select('users.name as alumno','alumnos.id as id_user','alumnos.matricula','alumnos.carrera','alumnos.semestre')->orderBy('alumnos.id','asc')->get();
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
        $id_A=alumno::join('users','users.id','=','alumnos.user_id')
        ->select('alumnos.id',)->where('user_id',$id)->get();
        $alumno=alumno::findOrFail($id_A);
        $user=user::findOrFail($id);
        return view('admin.updatealumno')->with(compact('alumno','user'));
            
    }

    public function update(Request $request){
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

        $user->save();
        $alumno->save();

        return redirect()->route('alumno');
            
    }

//Metodos para los profesores
    public function docente(){
        $docentes = User::join('docentes','users.id','=','docentes.user_id')
       ->select('users.name as docente','docentes.id','docentes.matricula','docentes.rfc')->orderBy('docentes.id','asc')->get();
        return view('admin.docente',compact('docentes'));
       
    }

    public function registrardocente(){
        return view('admin.registrardocente');
    }

    public function registroD(Request $request){

        $user= new User();
        $data = [
            "name" => $request->nombre.' '.$request->ap.' '.$request->am,
            "email" => $request->email,
            "password" => $request->password,
            "type_user" => 2
        ];
             User::create([
            'name' => $data['name'],
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

   

    public function admin(){
        return view('auth.register');
    }

   
    
}
