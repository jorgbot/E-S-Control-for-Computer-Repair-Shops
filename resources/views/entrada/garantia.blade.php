@extends('layouts.app')

@section('title', 'Servicios pendientes')
@section('content')

 @include('common.errors')
<div class="container text-center">
  <h1>Garantias pendientes</h1>
  <table id="table" style="margin: 20px" class="table table-striped table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="">Fecha</th>
        <th scope="col">Nombre</th>
        <th scope="col">Articulo</th>
        <th scope="col">Marca</th>
        <th scope="col">Modelo</th>
        <th scope="col">Serial</th>
        <th scope="col">C.C</th>
        <th scope="col">Actualizar</th>
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
         <td><a class="btn btn-primary" href="/entrada/{{ $entrada->slug }}">Ver</a></td>
       </tr> 
     @endforeach
   </tbody>
 </table>
</div>
  @if (isset($id))
   
 
    <script>
Ventana('https://web.whatsapp.com/send?phone={{ $entrada->telefono}}&text=*¡Hola, Bienvenid@ al Departamento Técnico / TECNOPLANET!*%0A %0ATu equipo acaba de ingresar a nuestro laboratorio técnico. El técnico encargado procederá con el respectivo diagnostico y se reportara con usted para proceder con la reparación y/o mantenimiento. Dependiendo del orden de llegada, se realizara la entrega.   Esperamos solucionar lo mas pronto posible tu orden, y que nuestros servicios prestados sean de su agrado 🤗.%0A %0A TECNOPLANET te desea un excelente resto de día !!! *{{$entrada->estado}}!*%0A%0A ' ,'','height=1550,width=1640');
</script>
 <script>
Ventana('/pdfEntrada/'+'{{ $id }}','','height=1000,width=600');
</script>

  @endif

    
    
  

@endsection

