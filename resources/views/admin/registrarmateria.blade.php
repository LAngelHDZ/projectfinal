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
                @error('errorMat')
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                      </svg>

                </div>
               
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="px-2">
                        <span>{{$message}}</span>
                    </div>
                  </div>
                
            @enderror
            @error('errorMatname')
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                      </svg>

                </div>
               
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="px-2">
                        <span>{{$message}}</span>
                    </div>
                  </div>
                
            @enderror
                <form  action="{{route('registraformM')}}"  method="POST" class="mb-5">
                    @csrf
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Materia</label>
                                <input type="text" name="materia" value="{{old('materia')}}" class="form-control bg-dark-x border-0"  >
                                @error('materia')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Clave</label>
                                <input type="text" name="clave" value="{{old('clave')}}" class="form-control bg-dark-x border-0"  >
                                @error('clave')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Descripción</label>
                                <textarea name="descripcion"  id="" cols="30" rows="10" class="form-control bg-dark-x border-0 mb-2">
                                    {{old('descripcion')}}
                                </textarea>
                                @error('descripcion')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Carrera</label>
                                <select name="carrera" id="" class="form-control bg-dark-x border-0 mb-2">
                                    <option value="" selected>Seleccione</option>
                                    <option value="ISC" >ISC</option>
                                    <option value="IBQ" >IBQ</option>
                                    <option value="IGE" >IGE</option>
                                    <option value="IEM" >IEM</option>
                                </select>
                                @error('carrera')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Semestre</label>
                                <select name="semestre" id="" class="form-control bg-dark-x border-0 mb-2">
                                    <option value="" selected>Seleccione</option>
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
                                    @error('semestre')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>                    
                    
                    <button  type="submit" class="btn btn-primary mx-auto">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</section>
    
@endsection