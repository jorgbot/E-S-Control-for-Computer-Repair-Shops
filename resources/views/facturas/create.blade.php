@extends('layouts.app')

@section('title', 'facturar servicio')
@section('content')
<div class="container">
 @include('common.errors')
   <form class="form-group" method="POST" action="/facturas/guardar" >
    @csrf
    <div class="container text-center">
      <h3>Facturar servicio</h3>
   <div class="form-group">
      @include('facturas.form')
   </div>
     <button class="btn btn-primary">Guardar</button>   
  </div>
   </form>
</div>

@endsection