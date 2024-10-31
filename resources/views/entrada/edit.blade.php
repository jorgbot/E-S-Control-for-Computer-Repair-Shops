@extends('layouts.app')

@section('title', 'Editar entrada')
@section('content')

<div class="container text-center">
  <form class="form-group" method="POST" action="/entrada/{{$entrada->slug}}" >
   	@method('PUT')
   	@csrf
   <div class="container">
   	  <h3>Actualizar estado de la entrada</h3>
   	   @if ($errors->any())
  <div class="alert alert-danger">
  	<ul>
  	    @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach 	
  	</ul>
  </div>
  
 @endif
     <div class="row">
      <div class="col-md-3">
      </div>
           <div class="col-md-6">
            <div class="">
              <label for="">Tipo de entrada :</label>
            <select  type="text" style="min-width: 250px" name="tipo"class="form-control " value="{{ $entrada->tipo }}" >
                    <option value="{{ $entrada->tipo }}" selected="selected">{{ $entrada->tipo }} (sin cambio)</option>
                    <option value="null" disabled="">-----</option>
                    <option value="servicio" >servicio</option>
                    <option value="garantia">garantia</option>
                </select>
            </div>
             <br>
           </div>
       <div class="col-md-6">
    	 <div class="form-group">
    	    <label for="">Nombre</label>
		    <input type="text" name="nombre" class="form-control" value="{{ $entrada->nombre }}">
		    <label for="">Numero de cedula </label>
		    <input type="text" name="cc" class="form-control" value="{{ $entrada->cc }}">
		    <label for="">Telefono</label>
		    <input type="text" name="telefono" class="form-control" value="{{ $entrada->telefono }}">
		    <label for="">Articulo</label>
		    <input type="text" name="articulo" class="form-control" value="{{ $entrada->articulo }}">
		    <label for="">Marca</label>
		    <input type="text" name="marca" class="form-control" value="{{ $entrada->marca }}">
		 </div>
       </div>
       <div class="col-md-6">
    	 <div class="form-group">
		   <label for="">Modelo</label>
		   <input type="text" name="modelo" class="form-control" value="{{ $entrada->modelo }}">
		   <label for="">Serial</label>
		   <input type="text" name="serial" class="form-control" value="{{ $entrada->serial }}">
		   <label for="">Problema reportado</label>
		   <input type="text" name="problema" class="form-control" value="{{ $entrada->problema }}">
		   <label for="">Notas</label>
		   <input type="text" name="notas" class="form-control" value="{{ $entrada->notas }}">
		   <label for="">Estado</label>
		   <select type="text" name="estado"class="form-control " value="{{ $entrada->estado }}">
                    <option value="{{ $entrada->estado }}" selected="selected">{{ $entrada->estado }} (sin cambio)</option>
                    <option value="null" disabled="">-----</option>
                    <option>En espera de revision</option>
                    <option>En revision</option>
                    <option>En espera de autorización</option>
                    <option>En reparacion</option>
                    <option>Reparado</option>
                    <option>Entregado</option>
                </select>
		   
	     </div>
	   </div>	
     </div>	
	</div>
	<div class="container text-center">
		<button class="btn btn-primary">Guardar</button> 
	</div>
  </form>
 
</div>
 
	

@endsection