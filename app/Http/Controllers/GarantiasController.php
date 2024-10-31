<?php

namespace tecno\Http\Controllers;

use Illuminate\Http\Request;

class GarantiasController extends Controller
{
    public function index(){
   	return view('garantias.index');
   } 
}
