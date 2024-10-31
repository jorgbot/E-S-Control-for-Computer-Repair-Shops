@extends('layouts.app')

@section('title', 'Servicios pendientes')
@section('content')

 @include('common.errors')
<div class="container text-center">
	<h1>Listado de Facturas por {{$tipo}} </h1>
  <div class="row table-responsive">
    <table id="table" style="margin: 20px" class="table table-striped table-bordered ">
    <thead class="thead-dark">
      <tr>
        <th >Tipo</th>
        <th style="min-width: 200px">Nombre</th>
        <th>CC</th>
        <th>SERVICIO</th>
        <th style="min-width: 250px">DETALLE</th>
        <th># TNS</th>
        <th>COSTO</th>
        <th>GANANCIA</th>
        <th>TOTAL</th>
        <th>OPCIONES</th>
      </tr>
   </thead>
   <tbody>
  	 <tbody>
        @if(count($facturas) > 0 )
        <?php $total_ganancia = 0 ?>
         @foreach($facturas as $factura)
           <?php $total_ganancia += $factura->ganacia; ?>
           <tr>
              <td>{{ $factura->tipo }}</td>
            @if(isset($factura->entrada))
             <td>{{ $factura->entrada->nombre }}</td>
             <td>{{ $factura->entrada->cc }}</td>
             <td>{{ $factura->entrada->id }}</td>
             <td>{{ $factura->servicio_detalle }}</td>
            @else
             <td>{{ $factura->cliente_nombre }}</td>
             <td>{{ $factura->cliente_cc }}</td>
             <td>*</td>
             <td>{{ $factura->servicio_detalle }}</td>
            @endif
             <td>{{ $factura->tns_id }}</td>
             <td>{{ $factura->costo }}</td>
             <td>{{ $factura->ganacia }}</td>
             <td>{{ $factura->total }}</td>
             <td>
              @if($factura->tipo == 'servicio')
                <a class="btn" target="__black" href="{{route('facturas.pdf',['id'=>$factura->id])}}">Ver</a>
              @endif
                <a class="btn" target="__black" href="{{route('facturas.eliminar',['id'=>$factura->id])}}">Eliminar</a>
              </td>
           </tr> 
        @endforeach
        @endif
   </tbody>
    </table>
  </div>
</div>
@endsection

