@extends('layouts.app')

@section('title', 'Servicios pendientes')
@section('content')

 @include('common.errors')
<div class="container text-center">
  <h1>Consultar Servicios Pendientes</h1>
    <div style="background-color: #fdfcfbeb;" class="col-md-12 panel card">

        <form class=" card-body form-groupn row" method="GET" action="/entrada/buscar/cc" >
         @csrf
    
          <div class="form-group col-md-4">  
             <label for="">Numero de cedula </label>
              </div>
                 <div class="form-group col-md-4">  
             <input type="text" name="cc" placeholder="Numero de C.C" class="form-control" value="{{ $cc }}">
          </div>
          <div class="form-group col-md-4">  
          <button class="btn btn-primary">BUSCAR</button>  
           </div> 
        </form>
    </div>
  <table style="margin: 20px" class="table table-striped table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Articulo</th>
        <th scope="col">Marca</th>
        <th scope="col">Modelo</th>
        <th scope="col">Serial</th>
        <th scope="col">Estado</th>
      </tr>
   </thead>
   <tbody>
     @foreach($entradas as $entrada)
       <tr>
         <td>{{ $entrada->nombre }}</td>
         <td>{{ $entrada->articulo }}</td>
         <td>{{ $entrada->marca }}</td>
         <td>{{ $entrada->modelo }}</td>
         <td>{{ $entrada->serial }}</td>
         <td>{{ $entrada->estado }}</td>
       </tr> 
     @endforeach
   </tbody>
 </table>
</div>
 
 

    
    
  

@endsection

