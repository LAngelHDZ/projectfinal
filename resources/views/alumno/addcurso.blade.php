@extends('alumno.panel')

@section('contentadmin')
<div class="container">
    <div class="d-flex flex-row-reverse my-2  ">
    </div>
    <div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Docente</th>
                <th scope="col">Materia</th>
                <th scope="col">Lunes</th>
                <th scope="col">Martes</th>
                <th scope="col">Miercoles</th>
                <th scope="col">Jueves</th>
                <th scope="col">Viernes</th>
                <th scope="col">Agregar</th>

              </tr>
            </thead>
            <tbody>
              @php
              $int=0;
              
              $i=0;
          @endphp
              
            
              @foreach ($cursos as $curso)
              @foreach ($horario_a as $item)
              @if($curso->id!==$item->horarioM_id)
              <tr>
                <th scope="row">{{$int+=1}}</th>
                <td>{{$curso->name.' '.$curso->apellidoP.' '.$curso->apellidoM}}</td>
                <td class="mt-3 ">{{$curso->materia}}</td>
                @php
                    $inth=0;
                @endphp
                @foreach ($horarios as $horario)

                 @if($curso->id===$horario->horarioM_id) 
                <td class="mt-3 ">
                    {{$horario->hora.' - '.$horario->aula}}
                        
                  
                </td>
                 
                @php
                    $inth+=1
                @endphp
                @endif
                @endforeach
                @if($inth<5)
                @for($i=0;$i<5-$inth;$i++)
                <td class="">{{'NA'}}</td>
                @endfor
                @endif
                <td class="">
                  <form method="POST" action="{{route('cursoAdd')}}">
                    @csrf
                    <input type="hidden" name="idC" value="{{$curso->id}}">
                    <input type="hidden" name="idA" value="{{$alumno[0]->id}}">
                    <button type="submit" class="btn btn-link py-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                    </button>
                  </form>
                </td>
              </tr>
              @endif 
              @endforeach 
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection