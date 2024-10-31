
@extends('layouts.app')


@section('content')
<div class="container">
 @include('common.errors')
   <form class="form" method="POST" action="{{ route('facturas.update',['id'=>$factura->id])}}" >
   	@csrf
   	<div class="container text-center">
   	<h3>Crear Facturas</h3>
    <div class="form-group">
      <label for="entrada">TIPO</label>
       <input disabled=""  type="text" class="form-control" name="tipo_id_show" id="tipo_id_show" aria-describedby="entrada" value="{{ $factura->tipo }}">
      <input hidden="" type="text" class="form-control" name="tipo_id" id="tipo_id" aria-describedby="entrada" value="{{ $factura->tipo }}>
    </div>
    @if(isset($factura->entrada))
	
	<div class="form-group">
      <label for="entrada">Entrada</label>
      <input  disabled=""  type="text" class="form-control" name="servicio_id_show" id="servicio_id_show" aria-describedby="servicio_id_show" value="{{ $factura->entrada->id }}">
      <input  hidden="" type="text" class="form-control" name="servicio_id" id="servicio_id" aria-describedby="servicio_id" value="{{ $factura->entrada->id }}">
      <small id="entradHelp" class="form-text text-muted">Ingrese el codigo de la entrada</small>
    </div>
    <div class="form-group">
      <label for="entrada_cliente">Cliente Nombre</label>
      <input disabled type="text" class="form-control" id="entrada_cliente" aria-describedby="entrada" placeholder="### Entrada" value="{{$factura->entrada->nombre}}">
      <small id="entradHelp" class="form-text text-muted">Ingrese el Nombre del Cliente</small>
    </div>
    <div class="form-group">
      <label for="entrada_cc">Cliente C.C</label>
      <input disabled type="text" class="form-control" id="entrada_cc" aria-describedby="entrada" placeholder="### Entrada" value="{{$factura->entrada->cc}}">
      <small id="entradHelp" class="form-text text-muted">Ingrese el Documento del Cliente</small>
    </div>
    @else
    <div class="form-group">
      <label for="entrada_cliente">Cliente Nombre</label>
      <input required="" type="text" class="form-control" name="entrada_cliente" id="entrada_cliente" value="{{$factura->cliente_nombre}}" aria-describedby="entrada" placeholder="### Entrada" >
      <small id="entradHelp" class="form-text text-muted">Ingrese el Nombre del Cliente</small>
    </div>
    <div class="form-group">
      <label for="entrada_cc">Cliente C.C</label>
      <input required="" type="text" class="form-control" name="entrada_cc" id="entrada_cc" aria-describedby="entrada" value="{{$factura->cliente_cc}}" placeholder="### Entrada">
      <small id="entradHelp" class="form-text text-muted">Ingrese el Documento del Cliente</small>
    </div>
    @endif
    <div class="form-group">
      <label for="tns">TNS</label>
      <input type="text" name="tns_id" class="form-control" id="tns" aria-describedby="tns" value="{{$factura->tns_id}}"  placeholder="### TNS" value="">
      <small id="tnsHelp" class="form-text text-muted">Ingrese el codigo de FACTURA TNS</small>
    </div>
    <div class="form-group">
      <label for="servicio">Servicio</label>
      <input required="" name="servicio_detalle" type="text" class="form-control" id="servicio" value="{{$factura->servicio_detalle}}" aria-describedby="servicio" placeholder="Detalle de Servicio">
      <small id="servicioHelp" class="form-text text-muted">Detalle de Servicio</small>
    </div>  
    <div class="form-group">
      <label for="costo">Costo</label>
      <input  name="costo" onkeyup="calculaTotal()" type="number" class="form-control" value="{{$factura->costo}}" id="costo" aria-describedby="costo" placeholder="$$ Costo">
      <small id="costoHelp" class="form-text text-muted">Ingrese el costo del servicio</small>
    </div>  
    <div class="form-group">
      <label for="total">Total</label>
      <input  name="total"   onkeyup="calculaTotal()" type="text" class="form-control" id="total" aria-describedby="total" value="{{$factura->total}}" placeholder="$$ Total">
      <small id="totalHelp" class="form-text text-muted">El total combrado al cliente, NOTA: Debe ser igual a lo facturado por TNS</small>
    </div>  
    <div class="form-group">
      <label for="ganacia">Ganancia</label>
      <input disabled="" name="ganacia" onkeyup="calculaTotal()" type="text" class="form-control" value="{{$factura->ganacia}}" id="ganancia" aria-describedby="ganancia" placeholder="$$ Ganancia">
      <small id="ganaciaHelp" class="form-text text-muted">Ingrese la ganancia</small>
    </div>
	<button class="btn btn-primary">Guardar</button> 	
	</div>
   </form>
   <script type="text/javascript">
        
    function calculaTotal(){
        $costo = document.getElementById('costo')
        $ganacia = document.getElementById('ganancia')
        $total = document.getElementById('total')
        $val_costo = $costo.value
        $val_total = $total.value
        $val_ganacia  = parseFloat($val_total  ) - parseFloat($val_costo )

        $ganacia.value = $val_ganacia.toLocaleString('es-ES', { style: 'currency', currency: 'COP' })
    }

   </script>
</div>

	
	

@endsection