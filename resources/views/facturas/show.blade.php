@extends('layouts.app')

@section('title', 'Facturar')
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
        <th scope="col">Problema reportado</th>
        <th scope="col">Nota</th>
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
         <td>{{ $entrada->problema }}</td>
         <td>{{ $entrada->notas }}</td>
         <td>{{ $entrada->estado }}</td>
         <td><a class="btn btn-primary" href="/entrada/{{ $entrada->slug }}/edit">Editar</a></td>
          <td>
             
        <a href="{{route('entrada.eliminar', [ $entrada->slug ]) }}"  type="submit"   class="btn btn-danger">
          eliminar
        </a> 
          </td>
       
    </tr>
   </tbody>
 </table>
</div>

@endsection