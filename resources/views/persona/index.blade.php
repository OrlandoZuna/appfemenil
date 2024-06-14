
@extends('layouts.app')
@section('cabecera')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('persona.index') }}">Personas</a>
    </li>
</ul>

@endsection
@section('titulo','Personas')
@section('subtitulo','Lista Personas')

@section('content')

<div class="row float-left">
    <a href="{{ route('persona.create') }}" class="btn btn-info"><i class="fa fa-user"></i> Nueva Persona</a>
</div>
<br>
@if(session('datos'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('datos') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif


@if(session('cancelar'))
<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
{{ session('cancelar') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif

@if(session('guardar'))
<div class="alert alert-primary alert-dismissible fade show" role="alert"> 
{{ session('guardar') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<nav class="navbar navbar-light float-right">
  <form class="form-inline">
  <select name="tipo" class="form-control" id="exampleFormControlSelect1">
      <option>Buscar Por:</option>
      <option>nombres</option>
      <option>apellidos</option>
      <option>dni</option>
    </select>

    <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Nombre.." aria-label="Search">
    
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>
</nav>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Ci</th>
      <th scope="col">Subdirectiva</th>
      <th scope="col">Inscripcion</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
  @foreach($personas as $persona)
    <tr>
      <td>{{$persona->nombres}}</td>
      <td>{{$persona->apellidos}}</td>
      <td>{{$persona->dni}}</td>
      <td>{{$persona->subdirectiva}}</td>
      <td>{{$persona->promocion}}</td>
      <td>
        <a href="{{ route('persona.edit',$persona->id)}}" class="btn btn-primary"  title="editar">
          <i class="fa fa-edit"></i> 
        </a>
        <a href="{{ route('persona.confirm',$persona->id)}}" class="btn btn-danger"  title="eliminar">
          <i class="fa fa-trash"></i></a>
        <a href="{{ route('pdf.registro',$persona->id)}}"  class="btn btn-secondary"  id="{{ $persona->id }}" title=" imprimir pdf de{{ $persona->nombres }}" target="_blank">
          <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
        </a>

     </td>

    </tr>
  @endforeach
   </tbody>
   </table>
  {{$personas}}
@endsection

<script type="text/javascript">

function ajaxRenderSection3(id_p, url) {
  console.log(url + id_p);
  var id_persona = id_p

        $.ajax({
            type: 'GET',
            url: url,
            data:{'idPer':id_persona},
            dataType: 'json',
            success: function (data, id_persona) {
              console.log(id_persona);
              console.log(url + "VHISDHVBDHF");
                $('#principalPanel').empty().append($(data, id_persona));
                console.log(id_persona);
            },
            error: function (data) {
                var errors = data.responseJSON;
                if (errors) {
                    $.each(errors, function (i) {
                    });
                }
            }
        });
}
</script>