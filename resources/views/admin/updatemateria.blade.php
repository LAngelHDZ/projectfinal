@extends('admin.panel')
@section('contentadmin')
<section class="container mt-3">
    <a class='border border-primary py-2 px-3 ' href="{{ route('materia') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-short " viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
          </svg>
        </a>
    <div class="row ">
        <div class="col-lg-8 flex-column align-items-end min-vh-100 mx-auto">
            <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
                <h1 class="font-weight-bold mb-4 text-dark  text-center">Registro de Materia</h1>
                <form  action="{{route('updateformM',$materia[0]->id)}}"  method="POST" class="mb-5" >
                    @csrf
                    @method('patch')
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Materia</label>
                                <input type="textarea" name="materia"  class="form-control bg-dark-x border-0"  value="{{$materia[0]->materia}}">
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Descripción</label>
                                <textarea name="descripcion" id="" cols="30" rows="10" class="form-control bg-dark-x border-0 mb-2">
                                    {{$materia[0]->descripcion}}
                                </textarea>
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Carrera</label>
                                <select name="carrera" id="" class="form-control bg-dark-x border-0 mb-2" >
                                    <option value="{{$materia[0]->categoria}}" selected>{{$materia[0]->categoria}}</option>
                                    <option value="ISC" >ISC</option>
                                    <option value="IBQ" >IBQ</option>
                                    <option value="IGE" >IGE</option>
                                    <option value="IEM" >IEM</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Semestre</label>
                                <select name="semestre" id="" class="form-control bg-dark-x border-0 mb-2">
                                    <option value="{{$materia[0]->semestre}}" selected>{{$materia[0]->semestre}}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>                        
                                </select>
                            </div>                    
                    
                    <button  type="submit" class="btn btn-primary mx-auto">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</section>
    
@endsection