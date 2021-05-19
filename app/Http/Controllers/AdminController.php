<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\alumno;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //

    public function alumno(){
       $alumno = User::join('alumnos','users.id','=','alumnos.user_id')
       ->select('users.name as alumno','alumnos.id','alumnos.matricula','alumnos.carrera','alumnos.semestre')->orderBy('alumnos.id','asc')->get();
        return view('admin.alumno',compact('alumno'));

    }

    public function registraralumno(){
        return view('admin.registraralumno');
    }

    public function admin(){
        return view('auth.register');
    }

    public function registroA(Request $request){

        $user= new User();
        $data = [
            "name" => $request->nombre.' '.$request->ap.' '.$request->am,
            "email" => $request->email,
            "password" => $request->password
        ];
             User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
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
    
}
