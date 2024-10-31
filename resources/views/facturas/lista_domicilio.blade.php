@extends('layouts.app')

@section('title', 'Domicilios por facturar')
@section('content')
<?php setlocale(LC_MONETARY, 'en_ES');?>
 @include('common.errors')
<div class="container text-center">
	<h1>Domicilios por  facturar</h1>
  <div class="row table-responsive">
    <table id="table" style="margin: 20px" class="table table-striped table-bordered ">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="cc">CC</th>
        <th scope="col">Articulo</th>
        <th scope="col">Costo</th>
        <th scope="col">Ganancia</th>
        <th scope="col">Total</th>
        <th scope="col">Estado</th>
        <th scope="col">Actualizar</th>
      </tr>
   </thead>
   <tbody>
    @if(count($facturas) > 0 )
  	 @foreach($facturas as $factura)
       <tr>
         <td>{{ $factura->cliente_nombre }}</td>
         <td>{{ $factura->cliente_cc }}</td>
         <td>@if($factura->entrada){{ $factura->entrada->articulo }}@endif</td>
         <td>{{ $factura->costo }}</td>
         <td>{{ $factura->ganacia }}</td>
         <td>{{ $factura->total }}</td>
         <td>@if($factura->entrada){{ $factura->entrada->estado }}@else {{ $factura->tipo }}@endif</td>
         <td><a class="btn btn-primary" href="{{ route('facturas.edit',['id'=>$factura->id]) }}">Facturar Domicilio</a>
         </td>
       </tr> 
     @endforeach
    @endif
   </tbody>
    </table>
  </div>
</div>
  @if (isset($id))
 <script>
Ventana('/pdfFactura/'+'{{ $id }}','','height=1000,width=600');
</script>

  @endif

 
    
	

@endsection

