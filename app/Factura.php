<?php

namespace tecno;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{

    protected $fillable = [
        'servicio_id',
        'tns_id',
        'costo',
        'ganacia',
        'total',
        'servicio_detalle'       
    ];

    public function entrada()
	{
	    return $this->belongsTo('tecno\Entrada','servicio_id', 'slug');
	}
}
