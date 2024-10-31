
@extends('layouts.app')


@section('content')
<div class="container">
 @include('common.errors')
   <form class="form" method="POST" target="_blanck" action="{{ route('facturas.reporte')}}" >
    @csrf
    <div class="container text-center">
    <h3>DETALLE GANACIA POR FECHAS</h3>
  <div class="form-group">
      <label for="fecha_inicio">Fecha Inicio</label>
      <input  type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" aria-describedby="fecha_inicio">
      <small id="entradHelp" class="form-text text-muted">Ingrese fecha de Inicio</small>
    </div>
    <div class="form-group">
      <label for="fecha_fin">Fecha Final</label>
      <input required="" type="date" class="form-control" name="fecha_fin" id="fecha_fin" aria-describedby="entrada" >
      <small id="entradHelp" class="form-text text-muted">Ingrese fecha Final</small>
    </div>
    <div class="form-group">
      <label for="fecha_fin">Tipo</label>
      <select required="" type="date" class="form-control" name="tipo" id="tipo" aria-describedby="entrada" >
        <option value="servicio">servicio</option>
        <option value="domicilio">domicilio</option>
      </select>
    </div>
  <button class="btn btn-primary">Generar Reporte</button>  
  </div>
   </form>
</div>

  
  

@endsection