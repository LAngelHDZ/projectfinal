@extends('layouts.app')

@section('content')
<div class="container">
<div>
    <nav class="navbar navbar-dark bg-primary navbar-expand-lg" >
        <a class="navbar-brand" href="#">Inicio</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
             <div class="navbar-nav">
               <a class="nav-item nav-link" href="{{ route('alumno') }}">{{ __('Alumno') }}<span class="sr-only">(current)</span></a>
               <a class="nav-item nav-link" href="#">Profesores</a>
               <a class="nav-item nav-link" href="#">Horarios</a>
               <a class="nav-item nav-link" href="#"></a>
           </div>
       </div>
   </nav>
 
   {{-- <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Dashboard') }}</div>

               <div class="card-body">
                   @if (session('status'))
                       <div class="alert alert-success" role="alert">
                           {{ session('status') }}
                       </div>
                   @endif

                   {{ __('Panel de administrador') }}
               </div>
           </div>
       </div>
   </div> --}}
</div>
@yield('contentadmin')
</div>
@endsection