<?php

namespace tecno;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{


protected $fillable = ['tipo','nombre', 'cc', 'telefono', 'articulo', 'marca', 'modelo','serial','problema','estado','slug','user_id'];



   /**
 * Get the route key for the model.
 *
 * @return string
 */
public function getRouteKeyName()
{
    return 'slug';
}

public function user()
{
    return $this->belongsTo('tecno\User','user_id','id');
}



}