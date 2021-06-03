@extends('welcome')

@section('content')
<div class="container ">
<div>
    <nav class="navbar navbar-dark bg-primary navbar-expand-lg" >
        <a class="navbar-brand" href="{{ route('alumn') }}">Inicio</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
             <div class="navbar-nav">
               <a class="nav-item nav-link" href="">{{ __('Datos') }}</a>
               <a class="nav-item nav-link" href="{{route('cursoA')}}">{{ __('Materias') }}</a>
               <a class="nav-item nav-link" href="">{{ __('Horario') }}</a>
               
           </div>
       </div>
   </nav>
 
</div>
@yield('contentadmin')
</div>
@endsection