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
  background-color:white  ;
  
 }

.section *
 {
  color:black;
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
   <div style="text-align: center;" >
               <img src="{{ asset('img/logo.png')  }}">
               <h5>CENTRO COMERCIAL GRAN BULEVAR LOCAL 130 - Av 0 #11-30 BARRIO LA PLAYA</h5>
               <h4>5837764 - 3153347256 - 3504196365</h4>
               <h5>www.tecnoplanet.com</h5>
            </div>

  <div id="q">
          <table style="width: 100%" class="section"> 
                <thead> 
                 <th>DETALLES DE GANANCIA </th>
                </thead>
          </table>
          <table class="section"  style="width: 100%">
              <thead>
                <th >Tipo</th>
                <th style="min-width: 200px">Nombre</th>
                <th>CC</th>
                <th>SERVICIO</th>
                <th style="min-width: 250px">DETALLE</th>
                <th># TNS</th>
                <th>COSTO</th>
                <th>GANANCIA</th>
                <th>TOTAL</th>
              </thead>
              <tbody>
              @if(count($facturas) > 0 )
              <?php $total_ganancia = 0 ?>
               @foreach($facturas as $factura)
                 <?php $total_ganancia += $factura->ganacia; ?>

                 <tr>
                    <td>{{ $factura->tipo }}</td>
                  @if(isset($factura->entrada))
                   <td>{{ $factura->entrada->nombre }}</td>
                   <td>{{ $factura->entrada->cc }}</td>
                   <td>{{ $factura->entrada->id }}</td>
                   <td>{{ $factura->servicio_detalle }}</td>
                  @else
                   <td>{{ $factura->cliente_nombre }}</td>
                   <td>{{ $factura->cliente_cc }}</td>
                   <td>*</td>
                   <td>{{ $factura->servicio_detalle }}</td>
                  @endif
                   <td>{{ $factura->tns_id }}</td>
                   <td>{{ $factura->costo }}</td>
                   <td>{{ $factura->ganacia }}</td>
                   <td>{{ $factura->total }}</td>
                   </td>
                 </tr> 
               @endforeach
              @endif
             </tbody>
          </table>
          <table class="section"  style="width: 100%">
              <tbody>
              @if(count($facturas) > 0 )
                 <tr>
                   <td>TOTAL GANANCIA:</td>
                   <td>{{ $total_ganancia }}</td>
                 </tr>
              @endif
             </tbody>
          </table>
          <div><p style="text-transform:uppercase  ">Despues de 30 Días de abandono del equipo, no nos hacemos responsables por el mismo.</p></div>
        </div>
     </div>
     <br>
     <br>
     <hr style="border: 1px dashed">
     <br>
     <br>   
</body>
</html> 