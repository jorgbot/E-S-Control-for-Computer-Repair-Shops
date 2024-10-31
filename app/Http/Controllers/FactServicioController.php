<?php

namespace tecno\Http\Controllers;
use tecno\Entrada;
use tecno\Factura;
use Illuminate\Http\Request;

class FactServicioController extends Controller
{
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        if ($request->user()){
            $request->user()->authorizeRoles(['user','admin','spadmin']);
            $facturas = Factura::where("tns_id","!=",NULL)->where('tipo','like',$request->tipo)->get();
            $tipo = $request->tipo;
            return view('facturas.index', compact('facturas','tipo'));
           }
         return redirect()->route('login');   
    }

    public function print( Request $request)
    {
        if ($request->user()){
            $request->user()->authorizeRoles(['user','admin','spadmin']);
            $facturas = Factura::where("tns_id","=",NULL)->orWhere("tns_id","=","")->get();
            $id = $request->id;
            return view('facturas.lista', compact('facturas', 'id'));
        }
        return redirect()->route('login');
    }

     public function fechas( Request $request)
    {
         if ($request->user()){
            $request->user()->authorizeRoles(['user','admin','spadmin']);
            return view('facturas.fechas');
           }
         return redirect()->route('login');
    }

    public function reporte( Request $request)
    {
         if ($request->user()){
            $request->user()->authorizeRoles(['user','admin','spadmin']);
            $fecha_inicio = $request->input('fecha_inicio');
            $fecha_fin = $request->input('fecha_fin');
            $facturas = Factura::where("tns_id","!=",NULL)->where('tipo','like',$request->input('tipo'))->whereBetween('created_at', [ $fecha_inicio , $fecha_fin])->get();
            return view('facturas.reporte', compact('facturas'));
           }
         return redirect()->route('login');
    }


    public function facturar(Request $request)
    {
       if ($request->user())
       {
          $request->user()->authorizeRoles(['user','admin','spadmin']);
          $facturas = Factura::where("tipo","!=","domicilio")->where("tns_id","=",NULL)->orWhere("tns_id","=","")->get();
          return view('facturas.lista', compact('facturas'));
       }
          return redirect()->route('login');
    }
    
    public function facturar_domicilio(Request $request)
    {
       if ($request->user())
       {
          $request->user()->authorizeRoles(['user','admin','spadmin']);
          $facturas = Factura::where("tipo","=","domicilio")->where("tns_id","=",NULL)->get();
          return view('facturas.lista_domicilio', compact('facturas'));
       }
          return redirect()->route('login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        if ($request->user())
         {
             $request->user()->authorizeRoles(['user','admin','spadmin']);
             $entrada =  Entrada::where('slug','=', $request->slug)->first();
             $tipo =  $request->tipo;
             return view('facturas.create',compact('entrada', 'tipo'));
         }
             return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura = new Factura();
        $servicio_id = $request->input('servicio_id');
        $entrada =  Entrada::where('id','=',$servicio_id)->first();
        if(isset($entrada)){
            $factura->tipo = 'servicio';  
            $factura->servicio_id = $entrada->slug;
            $factura->cliente_nombre = $entrada->nombre;
            $factura->cliente_cc = $entrada->cc;
            if($factura->tns_id != ""){
                $entrada->estado = "Facturado";
                $entrada->save();
            }
        }else{
            $factura->tipo = 'domicilio';  
            $factura->servicio_id = '';
            $factura->cliente_nombre =  $request->input('entrada_cliente');;
            $factura->cliente_cc =  $request->input('entrada_cc');;
        }
        
        $factura->tns_id = $request->input('tns_id');
        $factura->costo = $request->input('costo');
        $factura->total = $request->input('total');
        $factura->ganacia =  $factura->total  -  $factura->costo;
        $factura->servicio_detalle = $request->input('servicio_detalle');
        $factura->save();
        
                
        if($factura->tipo == "domicilio"){
            if($factura->tns_id != ''){
                return redirect()->route('facturas.print')->with('status','Factura creada correctamente');
            }else {
                return redirect()->route('entrada.index')->with('status','Factura creada correctamente');
            }
        } else if( $factura->tns_id != ''){
            return redirect()->route('facturas.print',['id'=>$factura->id])->with('status','Factura creada correctamente');
        } else {
            return redirect()->route('entrada.index')->with('status','Factura creada correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->user()){
            $request->user()->authorizeRoles(['user','admin','spadmin']);
            $factura =  Factura::where('id','=', $request->id)->with(['entrada'])->first();
            return view('facturas.edit', compact('factura'));
        }
         return redirect()->route('login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $factura = Factura::where('id','=',$request->id)->first();
        $entrada =  Entrada::where('slug','=',$factura->servicio_id)->first();
        $factura->fill($request->all());  
        $factura->costo = $request->input('costo');
        $factura->total = $request->input('total');
        $factura->ganacia =  $factura->total  -  $factura->costo;
        if(isset($entrada)){
            $factura->servicio_id = $entrada->slug;
        }
        $factura->save();
        if($factura->tns_id != ''){
            if(isset($entrada)){
               $entrada->estado = "Facturado";
               $entrada->save(); 
               return redirect()->route('facturas.print',['id'=>$factura->id])->with('status','Factura creada correctamente');
            }else{
                return redirect()->route('facturas.lista_domicilio');
            }
        }else if(isset($entrada) && $entrada->estado == "Entregado"){
          return redirect()->route('facturas.lista');
        } else {
          return redirect()->route('entrada.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()){
            $request->user()->authorizeRoles('spadmin');
            $factura =  Factura::where('id','=',$id)->first();
            $tipo = $factura->tipo;
            $factura->delete();
            return redirect()->route('facturas.index',['tipo'=>$tipo])->with('status','Factura eliminada corretamente');
        }
        return redirect()->route('login');
    }
}
