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
                <h1 class="font-weight-bold mb-4 text-dark  text-center">Registro de alumno</h1>
                <form  action="{{route('registraformA')}}"  method="POST" class="mb-5">
                    @csrf
                    <div class="row g-0 ">
                        <div class="col col-lg-6">
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Nombre</label>
                                <input type="text" name="nombre" pattern="[A-Z a-z]{2,30}" class="form-control bg-dark-x border-0"  placeholder="Ingresa tu nombre" >
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Apellido paterno</label>
                                <input type="text" name="ap" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa Apellido paterno">
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Apellido materno</label>
                                <input type="text" name="am" class="form-control bg-dark-x border-0"  placeholder="Ingresa tu Apellido materno" >
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Correo</label>
                                <input type="email" name="email" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa correo" >
                            </div>
                        </div>

                        <div class="col col-lg-6">
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Matricula</label>
                                <input type="text" name="matricula" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa matricula" >
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
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12" >12</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Contraseña</label>
                                <input type="password" name="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa contraseña" >
                            </div>
                        </div>                       
                    </div>
                    <button  type="submit" class="btn btn-primary mx-auto">Registrar</button>
                </form>
            </div>
        </div>
</section>
    
@endsection