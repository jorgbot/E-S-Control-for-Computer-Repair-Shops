<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/','welcome');

use tecno\Entrada;
use tecno\Factura;

Route::get('/pdfEntrada/{id?}', function ($id=null) {
	$entrada = Entrada::where('slug','like',$id)->with('user')->first();
   $pdf = \PDF::loadView('entrada.pdf',['entrada'=>$entrada]);
return $pdf->stream();
})->name('entrada.pdf');

Route::get('/pdfFactura/{id?}', function ($id=null) {
	$factura = Factura::where('id','=',$id)->first();
    $pdf = \PDF::loadView('facturas.pdf',['factura'=>$factura]);
	return $pdf->stream();
})->name('facturas.pdf');



Route::get('/mi_primer_ruta', function(){
	return 'HELLO WORD.';
});

Route::resource('garantias', 'GarantiasController');
Route::resource('entrada', 'EntradaController');


Route::get('entrada/tipo/garantia', 'EntradaController@garantia')->name('entrada.garantia');
Route::get('entrada/eliminar/{slug}', 'EntradaController@destroy')->name('entrada.eliminar');

Route::get('entrada/print/{id}', 'EntradaController@print')->name('entrada.print');
Route::get('entrada/buscar/cc', 'EntradaController@buscar')->name('entrada.buscar');

Route::get('entrada/whatsapp/{id}', 'EntradaController@print')->name('entrada.whatsapp');
Route::resource('servicios', 'ServiciosController');

Route::get('facturas/tipo/{tipo}','FactServicioController@index')->name('facturas.index');
Route::get('facturas/lista','FactServicioController@facturar')->name('facturas.lista');
Route::get('facturas/lista_domicilio','FactServicioController@facturar_domicilio')->name('facturas.lista_domicilio');
Route::get('facturas/create/{tipo}/{slug?}','FactServicioController@create')->name('facturas.create');
Route::post('facturas/update','FactServicioController@update')->name('facturas.update');
Route::get('facturas/{id}/edit','FactServicioController@edit')->name('facturas.edit');
Route::post('facturas/guardar','FactServicioController@store')->name('facturas.guardar');
Route::get('facturas/print/{id?}', 'FactServicioController@print')->name('facturas.print');
Route::get('facturas/reporte/fechas', 'FactServicioController@fechas')->name('facturas.reporte_fechas');
Route::post('facturas/reporte/print/{fecha_inicio?}/{fecha_final?}', 'FactServicioController@reporte')->name('facturas.reporte');
Route::get('facturas/eliminar/{id}', 'FactServicioController@destroy')->name('facturas.eliminar');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
