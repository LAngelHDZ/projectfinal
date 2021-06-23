@extends('admin.panel')
@section('contentadmin')
<section class="container">
        <div class="col-lg-12 flex-column align-items-end min-vh-100 mx-auto">
            <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
                <h1 class="font-weight-bold mb-4 text-dark  text-center">Datos Alumno</h1>
                <form  action=""  method="POST" class="mb-5">
                    <div class="row g-0 ">
                        <div class="col col-lg-6">
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Nombre</label>
                                <input type="text" name="nombre" class="form-control bg-dark-x border-0"  placeholder="Ingresa tu nombre" >
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Apellido paterno</label>
                                <input type="text" name="ap" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa Apellido paterno">
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Apellido materno</label>
                                <input type="text" name="am" class="form-control bg-dark-x border-0"  placeholder="Ingresa tu Apellido materno" >
                            </div>
                        </div>

                        <div class="col col-lg-6">
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Calle</label>
                                <input type="text" name="calle" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa nombre de la calle" >
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Número</label>
                                <input type="number" name="numero" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa el numero" >
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Colonia</label>
                                <input type="text" name="colonia" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa nombre de la Colonia" >
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Código Postal</label>
                                <input type="text" name="cp" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa el CP" >
                            </div>
                            <div class="mb-4">
                                <label  class="form-label font-weight-bold text-dark">Ciudad</label>
                                <input type="text" name="ciudad" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa nombre de la Ciudad" >
                            </div>
                        </div>                       
                    </div>
                    <button  type="submit" class="btn btn-primary mx-auto">Registrar</button>
                </form>
            </div>
        </div>

        
</section>
    
@endsection