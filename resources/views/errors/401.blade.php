@extends('layouts.app')
 @section('content')
 <style>
 	.center
 	{
  background-color: #fafafa;
  margin: 1rem;
  padding: 1rem;
  border: 2px solid #ccc;
  /* IMPORTANTE */
  text-align: center;
 	}
 </style>
  <div class="container">
  	<div class="center">
  		<h1 style="text-transform:uppercase  ">This action is unauthorized</h1>

  	<h1 style="text-transform:uppercase  ">Esta acción no está autorizada.</h1>
  	<a href=" {{ route('entrada.index') }}" type="button" class="btn btn-primary">REGRESAR</a>
  	</div>
  	
  </div>
@endsection 