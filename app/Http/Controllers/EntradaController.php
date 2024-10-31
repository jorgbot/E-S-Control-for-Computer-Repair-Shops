<?php

namespace tecno\Http\Controllers;
use tecno\Entrada;
use tecno\Factura;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use tecno\Http\Requests\StoreEntradaRequest;
class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($request->user())
       {
         $request->user()->authorizeRoles(['user','admin','spadmin']);
         $entradas = Entrada::where("estado","not like","entregado")
          ->where("estado","not like","Facturado")
         ->where("tipo","not like","garantia")->get();
         return view('entrada.index', compact('entradas'));
       }
         return redirect()->route('login');
    }

    
    public function garantia(Request $request)
    {
       if ($request->user()){
        $request->user()->authorizeRoles(['admin','spadmin']);
        $entradas = Entrada::where("estado","not like","entregado")
        ->where("tipo","not like","servicio")->get();
     return view('entrada.garantia', compact('entradas'));
       }
         return redirect()->route('login');
    }

   
     public function print( Request $request, $id)
    {
         if ($request->user()){
        $request->user()->authorizeRoles(['user','admin','spadmin']);
        $entradas = Entrada::where("estado","not like","entregado")->get();
        return view('entrada.index', compact('entradas','id'));
     return view('entrada.index', compact('entradas'));
       }
         return redirect()->route('login');

       
    }

      public function buscar( Request $request)
    {
        $cc=$request->input('cc');
         $entradas = Entrada::where("cc","=", $cc)->get();    
        return view('entrada.buscar', compact('entradas','cc')); 
               
    }

     public function whatsapp( Request $request, $id)
    {

        $request->user()->authorizeRoles(['user','admin','spadmin']);
        $entradas = Entrada::where("estado","not like","entregado")->get();
        return view('entrada.index', compact('entradas','id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         if ($request->user())
         {
             $request->user()->authorizeRoles(['user','admin','spadmin']);
             return view('entrada.create');
             return view('entrada.index', compact('entradas'));
         }
             return redirect()->route('login');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntradaRequest $request)
    {
       
        $entrada = new Entrada();
        $entrada->tipo =$request->input('tipo');  
        $entrada->nombre = $request->input('nombre');
        $entrada->cc = $request->input('cc');
        $entrada->telefono = $request->input('telefono');
        $entrada->articulo = $request->input('articulo');
        $entrada->marca = $request->input('marca');
        $entrada->modelo = $request->input('modelo');
        $entrada->serial = $request->input('serial');
        $entrada->problema = $request->input('problema');
        $entrada->notas = $request->input('notas');
        $entrada->estado = $request->input('estado');
        $entrada->slug =$request->input('nombre').time();
        $entrada->user_id=  Auth::user()->id;
        $entrada->save();
        if($entrada->estado == 'Entregado' || $entrada->estado == 'Reparado'){
            $factura = Factura::where('servicio_id','=',$entrada->slug)->first();
            if($factura){
              return redirect()->route('facturas.edit', ['id'=>$factura->id]);
            }else{
              return redirect()->route('facturas.create',['tipo'=>'servicio','slug' => $entrada->slug]);
            }
        }
        return redirect()->route('entrada.print',['id'=>$entrada->slug])->with('status','Entrada creadad corretamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Entrada $entrada)
    {
     
        return view('entrada.show', compact('entrada'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdf( Entrada $entrada)
    {
        
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('entrada/pdf',['entrada']);
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Entrada $entrada)
    {
         if ($request->user()){
        $request->user()->authorizeRoles(['user','admin','spadmin']);
        return view('entrada.edit', compact('entrada'));
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
    public function update(Request $request, Entrada $entrada)
    {

        $entrada->fill($request->all());
        $entrada->save();
        $entrada->refresh();
        if($entrada->estado == 'Entregado' || $entrada->estado == 'Reparado'){
            $factura = Factura::where('servicio_id','=',$entrada->slug)->first();
            if($factura){
              return redirect()->route('facturas.edit', ['id'=>$factura->id]);
            }else{
              return redirect()->route('facturas.create',['tipo'=>'servicio','slug' => $entrada->slug]);
            }
        }else{
          $wt=true;
          return view('entrada.show', compact('entrada','wt'));  
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
         if ($request->user()){
        $request->user()->authorizeRoles('spadmin');
        $entrada =  Entrada::where('slug','=',$slug)->first();
        $entrada->delete();
        return redirect()->route('entrada.index');
       }
         return redirect()->route('login');
        
    }
}
