@extends('admin.panel')
@section('contentadmin')
<section class="container mt-3">
    <a class='border border-primary py-2 px-3 ' href="{{ route('alumno') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-short " viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
          </svg>
        </a>
        <div class="col-lg-12 flex-column align-items-end min-vh-100 mx-auto">
            <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
                <h1 class="font-weight-bold mb-4 text-dark  text-center">Actualizar docente</h1>
                <form  action="{{route('updateformD')}}"  method="POST" class="mb-5">
                    @csrf
                    @method('patch')
                    <div class="row g-0 ">
                        <div class="col col-lg-6">
                            <div class="mb-4">
                                <input type="hidden" name="idU" value="{{$user[0]->id}}">
                                <input type="hidden" name="idD" value="{{$docente->id}}">
                                <label  class="form-label font-weight-bold text-dark">Nombre</label>
                                <input type="text" name="nombre" pattern="[A-Z a-z]{2,20}" class="form-control bg-dark-x border-0"  value="{{$user[0]->name}}" >
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Apellido paterno</label>
                                <input type="text" name="ap" pattern="[A-Z a-z]{2,20}" class="form-control bg-dark-x border-0 mb-2" value="{{$user[0]->apellidoP}}">
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Apellido materno</label>
                                <input type="text" name="am" pattern="[A-Z a-z]{2,20}" class="form-control bg-dark-x border-0"  value="{{$user[0]->apellidoM}}" >
                            </div>
                           
                           
                        </div>

                        <div class="col col-lg-6">
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Matricula</label>
                                <input type="text" name="matricula" class="form-control bg-dark-x border-0 mb-2" value="{{$docente->matricula}}" >
                            </div>
                            
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">RFC</label>
                                <input type="text" name="rfc" class="form-control bg-dark-x border-0"  value="{{$docente->RFC}}" >
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Correo</label>
                                <input type="email" name="email" class="form-control bg-dark-x border-0 mb-2" value="{{$user[0]->email}}" >
                            </div>

                        </div>                       
                    </div>
                    <button  type="submit" class="btn btn-primary mx-auto">Guardar</button>
                </form>
            </div>
        </div>
</section>
    
@endsection