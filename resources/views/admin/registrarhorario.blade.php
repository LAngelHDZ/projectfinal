@extends('admin.panel')
@section('contentadmin')
<section class="container mt-3">
    <a class='border border-primary py-2 px-3 ' href="{{ route('horario',$id) }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-short " viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
          </svg>
        </a>
    <div class="row ">
        <div class="col-lg-8 flex-column align-items-end min-vh-100 mx-auto">
            <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
                <h1 class="font-weight-bold mb-4 text-dark  text-center">Registro de Horario</h1>
                <form  action="{{route('registrarformH')}}"  method="POST" class="mb-5">
                    @csrf
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Hora</label>
                               <input type="time" name="hora" id="" class="form-control bg-dark-x border-0 mb-2">
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Dia</label>
                                <select name="dia" id="" class="form-control bg-dark-x border-0 mb-2">
                                    <option value="" selected>Seleccione</option>
                                    <option value="Lunes" >Lunes</option>
                                    <option value="Martes" >Martes</option>
                                    <option value="Miercoles" >Miercoles</option>
                                    <option value="Jueves" >Jueves</option>
                                    <option value="Viernes" >Viernes</option>
                                            
                                </select>
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Aula</label>
                               <input type="text" name="aula" pattern="[0-9]{3}" id="" class="form-control bg-dark-x border-0 mb-2">
                               <input type="hidden" name="id" value="{{$id}}">
                            </div>                    
                    
                    <button  type="submit" class="btn btn-primary mx-auto">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</section>
    
@endsection