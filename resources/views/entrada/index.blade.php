@extends('layouts.app')

@section('title', 'Servicios pendientes')
@section('content')

 @include('common.errors')
<div class="container-fluid text-center">
	<h1>Servicios pendientes</h1>
	<div class="container">
	    <div class="row table-responsive">
    <table id="table" style="margin: 20px" class="table table-striped table-bordered ">
    <thead class="thead-dark">
      <tr>
        <th scope="">Fecha</th>
        <th scope="">Nombre</th>
        <th scope="">Articulo</th>
        <th scope="">Marca</th>
        <th scope="">Modelo</th>
        <th scope="">Serial</th>
        <th scope="">C.C</th>
        <th scope="">Actualizar</th>
      </tr>
   </thead>
   <tbody>
  	 @foreach($entradas as $entrada)
       <tr>
         <td>{{ $entrada->created_at }}</td>
         <td>{{ $entrada->nombre }}</td>
         <td>{{ $entrada->articulo }}</td>
         <td>{{ $entrada->marca }}</td>
         <td>{{ $entrada->modelo }}</td>
         <td>{{ $entrada->serial }}</td>
         <td>{{ $entrada->cc }}</td>
         <td><a class="btn btn-primary" href="/entrada/{{ $entrada->slug }}">Ver</a>
         </td>
       </tr> 
     @endforeach
   </tbody>
    </table>
  </div>
	</div>
</div>
  @if (isset($id))
   
 
    <script>
Ventana('https://web.whatsapp.com/send?phone={{ $entrada->telefono}}&text=*¡Hola, Bienvenid@ al Departamento Técnico / TECNOPLANET!*%0A %0A Esperamos solucionar lo mas pronto posible tu orden, y que nuestros servicios prestados sean de su agrado 🤗.%0A *ESTADO DE TU ORDEN :{{$entrada->estado}}!*%0A%0A. Aqui podras consultar el estado de tu dispositivo https://tecno.tecnoplanet.com.co/entrada/buscar/cc !!!  ' ,'','height=1550,width=1640');
</script>
 <script>
Ventana('/pdfEntrada/'+'{{ $id }}','','height=1000,width=600');
</script>

  @endif

 
    
	

@endsection

