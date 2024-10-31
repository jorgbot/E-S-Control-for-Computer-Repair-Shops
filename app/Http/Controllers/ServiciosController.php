<?php

namespace tecno\Http\Controllers;

use Illuminate\Http\Request;

class ServiciosController extends Controller
{
   public function index(){
   	return view('servicios.index');
   } 
}
