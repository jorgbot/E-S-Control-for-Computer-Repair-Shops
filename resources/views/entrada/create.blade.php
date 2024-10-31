@extends('layouts.app')

@section('title', 'Crear entrada')
@section('content')
<div class="container">
 @include('common.errors')
   <form class="form-group" method="POST" action="/entrada" >
   	@csrf
   	<div class="container text-center">
   		<h3>Crear entrada</h3>
	 <div class="form-group">
	    @include('entrada.form')
	 </div>
	   <button class="btn btn-primary">Guardar</button> 	
	</div>
   </form>
</div>

	
	

@endsection