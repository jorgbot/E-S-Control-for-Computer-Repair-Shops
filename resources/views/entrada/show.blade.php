@extends('layouts.app')

@section('title', 'Entrada')
@section('content')
@include('common.success')
<div class="container text-center">
  <h1 style="text-transform: uppercase;" >{{ $entrada->tipo }}</h1>
  <table id="tabla" style="margin: 20px" class="table table-striped table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Numero de cedula</th>
        <th scope="col">Telefono</th>
        <th scope="col">Articulo</th>
        <th scope="col">Marca</th>
        <th scope="col">Modelo</th>
        <th scope="col">Serial</th>
        <th scope="col">Estado</th>
        <th scope="col">Actualizar</th>
        <th scope="col">Eliminar</th>
      </tr>
   </thead>
   <tbody>
       <tr>
         <td>{{ $entrada->nombre }}</td>
         <td>{{ $entrada->cc }}</td>
         <td>{{ $entrada->telefono }}</td>
         <td>{{ $entrada->articulo }}</td>
         <td>{{ $entrada->marca }}</td>
         <td>{{ $entrada->modelo }}</td>
         <td>{{ $entrada->serial }}</td>
         <td>{{ $entrada->estado }}</td>
         <td>
             <a class="btn btn-success" target="_blank" href="{{ route('entrada.pdf',['id'=>$entrada->slug])}}">PDF</a>
             <a class="btn btn-primary" href="/entrada/{{ $entrada->slug }}/edit">Editar</a></td>
          <td>
             
        <a href="{{route('entrada.eliminar', [ $entrada->slug ]) }}"  type="submit"   class="btn btn-danger">
          eliminar
        </a> 
          </td>
       
    </tr>
   </tbody>
 </table>
</div>
 

  	  @if (isset($wt))
    <script>
Ventana('https://api.whatsapp.com/send?phone={{ $entrada->telefono}}&text=*¡Hola, Bienvenid@ al Departamento Técnico / TECNOPLANET!*%0A %0ATu equipo acaba de ingresar a nuestro laboratorio técnico. El técnico encargado procederá con el respectivo diagnostico y se reportara con usted para proceder con la reparación y/o mantenimiento. Dependiendo del orden de llegada, se realizara la entrega.   Esperamos solucionar lo mas pronto posible tu orden, y que nuestros servicios prestados sean de su agrado 🤗.%0A %0A TECNOPLANET te desea un excelente resto de día !!! %0A*Estado:{{$entrada->estado}}*','','height=550,width=640');
</script>
  @endif
    
	

@endsection