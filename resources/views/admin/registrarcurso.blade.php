@extends('admin.panel')
@section('contentadmin')
<section class="container mt-3">
    <a class='border border-primary py-2 px-3 ' href="{{ route('curso') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-short " viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
          </svg>
        </a>
    <div class="row ">
        <div class="col-lg-8 flex-column align-items-end min-vh-100 mx-auto">
            <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
                <h1 class="font-weight-bold mb-4 text-dark  text-center">Registro de Curso</h1>
                <form  action="{{route('registraformC')}}"  method="POST" class="mb-5">
                    @csrf
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Docente</label>
                                <select name="docente" id="" class="form-control bg-dark-x border-0 mb-2">
                                    <option value="" selected>Seleccione</option>
                                    @foreach ($docentes as $docente)
                                        <option value="{{$docente->docente_id}}" >{{ $docente->docente_id.'.- '.$docente->name.' '.$docente->apellidoP.' '.$docente->apellidoM}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Materia</label>
                                <select name="materia" id="" class="form-control bg-dark-x border-0 mb-2">
                                    <option value="" selected>Seleccione</option>
                                    @foreach ($materias as $materia)
                                    |   <option value="{{$materia->id}}" >{{$materia->id.'.-'.$materia->materia}}</option>
                                    @endforeach         
                                </select>
                            </div>                    
                    
                    <button  type="submit" class="btn btn-primary mx-auto">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</section>
    
@endsection