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
  @for($i=0;$i<2;$i++)
  <div id="q">
      <div style="text-align: center;" >
               <img src="{{ asset('img/logo.png')  }}">
               <h5>CENTRO COMERCIAL GRAN BULEVAR LOCAL 130 - Av 0 #11-30 BARRIO LA PLAYA</h5>
               <h4>5837764 - 3153347256 - 3504196365</h4>
               <h5>www.tecnoplanet.com</h5>
            </div>
            <div style="text-align: left;">
              <table class="section"> 
                <thead> 
                 <th>DETALLES DE LA ORDEN </th>
                </thead>
              </table>
              <table id="a">
                <tbody>
                  <tr >
                    <th>Orden de entrada</th>
                  <td>{{ $entrada->id }}</td>
                  <th>Fecha:</th>
                  <td>{{ $entrada->created_at }}</td>
                  </tr>
                  
                </tbody>
              </table>
              <table style="width: 100%">
                
               <tbody>
                  <tr>
                    <th for="">Estado</th>
                         <td colspan="3"   for="">{{ $entrada->estado }}</td> 
                  </tr>
                  <tr style="text-align: left;">
                <th>Nombre del cliente</th>
                <td>{{ $entrada->nombre }}</td>
                <th>Telefono:</th>
                          <td>{{ $entrada->telefono }}</td>
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
            <tbody>
              
              <tr>
                <th >Articulo</th>
                          <td >{{ $entrada->articulo }}</td>
                          <th  >Modelo</th>
                          <td  >{{ $entrada->modelo }}</td>
              </tr>
              <tr>
                   <th>Marca</th>
                           <td >{{ $entrada->marca }}</td> 
                           <th >Serial</th>
                           <td  >{{ $entrada->serial }}</td> 
              </tr>
              <tr >
                <th>Problema reportado</th> 
                          <td colspan="3" >{{$entrada->problema }}</td>
              </tr>
              <tr >
                 <th>Notas</th>
                         <td colspan="3" >{{ $entrada->notas }}</td>
                 
              </tr>
              
              <tr class="section">
                <th>Tenico encargado</th>
                <td>{{ $entrada->user->name }}</td>
                <th>Telefono:</th>
                <td>{{$entrada->user->tel }}</td>
              </tr>
             
              
            </tbody>
          </table>
          <div><p style="text-transform:uppercase;font-size:18px">Despues de 30 Días de abandono del equipo, no nos hacemos responsables por el mismo.</p></div>
        </div>
     </div>
     <br>
     <br>
     <br>
     @endfor
     
    
</body>
</html> 