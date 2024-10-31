<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  
  <style>
  table#a {
   width:   100% ;
}
table#c {
  
   
}
.container{
    text-align:center
}
.left{
    float: left;
    background:blue;
}
.right{
    float: right;
    background:red;
}
.center{
    background:green;
   display:inline-block;
}
 .section
 {
  width:  100%;
  background-color:#626567  ;
  
 }

.section *
 {
  color:white;
  text-align: center;
 }

img{
  margin: 1% !important;

  width: 40% !important;
}

h4 {
    margin: 0px !important;
}
h5 {
    margin: 0px !important;
}

th {
    border: 1px solid black;
    color: black;
    font-weight:  lighter; 

}
td {
    border: 1px solid;
    font-weight:  bold; 
}
*{
     
  font-family: sans-serif ;
  font-size: small;
  color:  black;
}

  </style>
</head>
<body >
   @if(isset($factura->entrada))
   <div style="text-align: center;" >
               <img src="{{ asset('img/logo.png')  }}">
               <h5>CENTRO COMERCIAL GRAN BULEVAR LOCAL 130 - Av 0 #11-30 BARRIO LA PLAYA</h5>
               <h4>5837764 - 3153347256 - 3504196365</h4>
               <h5>www.tecnoplanet.com</h5>
            </div>
  @for($i=0;$i<2;$i++)
  <div id="q">
     
            <div style="text-align: left;">
              @if(isset($factura->entrada))
              <table class="section"> 
                <thead> 
                 <th>DETALLES DE LA ORDEN </th>
                </thead>
              </table>
              <table id="a">
                
                <tbody>
                  <tr >
                    <th>Orden de entrada</th>

                  <td>{{ $factura->entrada->id }}</td>
                  <th>Fecha:</th>
                  <td>{{ $factura->entrada->created_at }}</td>
                  </tr>
                </tbody>
              </table>
              @endif
              <table style="width: 100%">
                
               <tbody>
                  <tr>
                    <th for="">Estado</th>
                         <td colspan="3"   for="">
                          @if(isset($factura->entrada))
                          {{ $factura->entrada->estado }} @else Facturado @endif</td> 
                  </tr>
                  <tr style="text-align: left;">
                <th>Costo de Servicio</th>
                <td>{{ $factura->total }}</td>
                <th>Tipo:</th>
                          <td>{{ $factura->tipo }}</td>
              </tr>
                <tr style="text-align: left;">
                <th>Nombre del cliente</th>
                <td>{{ $factura->cliente_nombre}}</td>
                <th>Telefono:</th>
                 @if(isset($factura->entrada))
                          <td>{{ $factura->entrada->telefono }} @endif</td>
              </tr>
                </tbody>
              </table>
            </div>
        <div>
           <table style="width: 100%" class="section"> 
                <thead> 
                 <th>DETALLES DEL SERVICIO </th>
                </thead>
              </table>
          <table style="width: 100%">
            @if(isset($factura->entrada))
            <tbody>
              
              <tr>
                <th >Articulo</th>
                          <td >{{ $factura->entrada->articulo }}</td>
                          <th  >Modelo</th>
                          <td  >{{ $factura->entrada->modelo }}</td>
              </tr>
              <tr>
                   <th>Marca</th>
                           <td >{{ $factura->entrada->marca }}</td> 
                           <th >Serial</th>
                           <td  >{{ $factura->entrada->serial }}</td> 
              </tr>
              <tr >
                <th>Problema reportado</th> 
                          <td colspan="3" >{{$factura->entrada->problema }}</td>
              </tr>
              <tr >
                 <th>Notas</th>
                         <td colspan="3" >{{ $factura->entrada->notas }}</td>
                 
              </tr>
              
              <tr class="section">
                <th>Tenico encargado</th>
                <td>{{ $factura->entrada->user->name }}</td>
                <th>Telefono:</th>
                          <td>{{$factura->entrada->user->tel }}</td>
              </tr>
               <tr>
                <th>FIRMA CLIENTE  __________________________________________</th>
               
              </tr>
              
            </tbody>
            @else 
            <tbody>
              
              <tr>
                <th >DETALLES</th>
                <td >{{ $factura->detalle_servicio }}</td>
              </tr>
              <tr>
                <th>FIRMA CLIENTE  __________________________________________</th>
               
              </tr>
            </tbody>
            @endif
          </table>
        </div>
     </div>
     <br>
     <br>
     <hr style="border: 1px dashed">
     <br>
     <br>
     @endfor
     @endif
    
</body>
</html> 