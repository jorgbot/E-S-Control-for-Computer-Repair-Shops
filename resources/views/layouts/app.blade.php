<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'TECNOPLANET' }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
     
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        
        function Permut (flag,img) {
   if (document.images) {
        if (document.images[img].permloaded) {
            if (flag==1) document.images[img].src = document.images[img].perm.src
            else document.images[img].src = document.images[img].perm.oldsrc
        }
   }
}
function preloadPermut (img,adresse) {
   if (document.images) {
        img.onload = null;
        img.perm = new Image ();
        img.perm.oldsrc = img.src;
        img.perm.src = adresse;
        img.permloaded = true;
   }
}
function newWindow(a_str_windowURL, a_str_windowName, a_int_windowWidth, a_int_windowHeight, a_bool_scrollbars, a_bool_resizable, a_bool_menubar, a_bool_toolbar, a_bool_addressbar, a_bool_statusbar, a_bool_fullscreen) {
  var int_windowLeft = (screen.width - a_int_windowWidth) / 2;
  var int_windowTop = (screen.height - a_int_windowHeight) / 2;
  var str_windowProperties = 'height=' + a_int_windowHeight + ',width=' + a_int_windowWidth + ',top=' + int_windowTop + ',left=' + int_windowLeft + ',scrollbars=' + a_bool_scrollbars + ',resizable=' + a_bool_resizable + ',menubar=' + a_bool_menubar + ',toolbar=' + a_bool_toolbar + ',location=' + a_bool_addressbar + ',statusbar=' + a_bool_statusbar + ',fullscreen=' + a_bool_fullscreen + '';
  //var obj_window = window.open(a_str_windowURL, a_str_windowName, str_windowProperties)
  //window.open('//catsystem.com.co/javascript/examples/sample_popup.cfm','popUpWindow','height=502,width=400,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
  //return false;
  var obj_window = window.open(a_str_windowURL,'popUpWindow','height=500,width=400,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
  if (parseInt(navigator.appVersion) >= 4) {
     obj_window.window.focus();
  }
  return false;
}
function Ventana(theURL,winName,features)
{
  window.open(theURL,winName,features);
}
function winerror(msgerror)
{
  alert(msgerror);
}
function imprimir()
{ 
  bV = parseInt(navigator.appVersion);
  if (bV >= 4) window.print();
}
function Ventana_Mensaje()
{
  var popurl='$url?tit=$tit&msg=$msgerror&img=$img'
  winpops=window.open(popurl,'','width=400,height=200, top=60, left=150, toolbar=no, menubar=no, location=no, directories=0, status=0, scrollbar=1, resizable=yes')
}

    </script>
</head>
<body style=" background-image: url(' {{ asset('img/fondo.jpg') }}');background-size: 100%;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img width="25% !important" src="{{ asset('img/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                           
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('entrada.index') }}">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Facturacion <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('facturas.lista') }}">Servicios por Facturar</a>
                                  <a class="dropdown-item" href="{{ route('facturas.lista_domicilio') }}">Domicilio por Facturar</a>
                                  <a class="dropdown-item" href="{{ route('facturas.reporte_fechas') }}">Reporte por Fecha</a>
                                  <a class="dropdown-item" href="{{ route('facturas.index',['tipo'=>'servicio'])}}">Listado por Servicio</a>
                                  <a class="dropdown-item" href="{{ route('facturas.index',['tipo'=>'domicilio'])}}">Listado por Domicilio</a>
                                </div>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('entrada.create') }}">Crear</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('entrada.garantia') }}">Garantia</a>
                            </li >
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('facturas.create',['slug'=>'','tipo'=>'domicilio']) }}">Domicilio</a>
                            </li >
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>
                                    
                                       @if (Route::has('register'))
                                           
                                           <a class="dropdown-item" href="{{ route('register') }}">Registrar</a>
                                           
                                        @endif
                                    
                                     
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

 <script>
  $(document).ready(function() {
    if($('#table').length > 0){
      $('#table').DataTable(
        {
          "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
      });
    }   
  });
</script>
</body>
</html>
