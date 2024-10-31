@extends('layouts.app')

@section('title', 'Crear entrada')
@section('content')
<div class="container">
 @include('common.errors')
   <form class="form" method="POST" action="{{factura.store}}" >
   	@csrf
   	<div class="container text-center">
   	<h3>Crear Factura</h3>
	<div class="form-group">
      <label for="entrada">Entrada</label>
      <input disabled type="text" class="form-control" id="entrada" aria-describedby="entrada" placeholder="### Entrada">
      <small id="entradHelp" class="form-text text-muted">Ingrese el codigo de la entrada</small>
    </div>
    <div class="form-group">
      <label for="entrada">Cliente Nombre</label>
      <input disabled type="text" class="form-control" id="entrada" aria-describedby="entrada" placeholder="### Entrada" value="{{$entrada.nombre}}">
      <small id="entradHelp" class="form-text text-muted">Ingrese el codigo de la entrada</small>
    </div>
    <div class="form-group">
      <label for="entrada">Cliente C.C</label>
      <input disabled type="text" class="form-control" id="entrada" aria-describedby="entrada" placeholder="### Entrada" value="{{$entrada.cc}}">
      <small id="entradHelp" class="form-text text-muted">Ingrese el codigo de la entrada</small>
    </div>
    <div class="form-group">
      <label for="tns">TNS</label>
      <input  required="" type="text" class="form-control" id="tns" aria-describedby="tns" placeholder="### TNS">
      <small id="tnsHelp" class="form-text text-muted">Ingrese el codigo de FACTURA TNS</small>
    </div>
    <div class="form-group">
      <label for="servicio">Servicio</label>
      <input  required="" type="text" class="form-control" id="servicio" aria-describedby="servicio" placeholder="Detalle de Servicio">
      <small id="servicioHelp" class="form-text text-muted">Detalle de Servicio</small>
    </div>  
    <div class="form-group">
      <label for="costo">Costo</label>
      <input  required=""  type="number" class="form-control" id="costo" aria-describedby="costo" placeholder="$$ Costo">
      <small id="costoHelp" class="form-text text-muted">Ingrese el costo del servicio</small>
    </div>  
    <div class="form-group">
      <label for="ganacia">Ganancia</label>
      <input required=""  type="text" class="form-control" id="ganancia" aria-describedby="ganancia" placeholder="$$ Ganancia">
      <small id="ganaciaHelp" class="form-text text-muted">Ingrese la ganancia</small>
    </div>
    <div class="form-group">
      <label for="total">Total</label>
      <input required=""  type="text" class="form-control" id="total" aria-describedby="total" placeholder="$$ Total">
      <small id="totalHelp" class="form-text text-muted">El total combrado al cliente, NOTA: Debe ser igual a lo facturado por TNS</small>
    </div>  
	<button class="btn btn-primary">Guardar</button> 	
	</div>
   </form>
</div>

	
	

@endsection