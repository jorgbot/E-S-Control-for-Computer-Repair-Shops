<?php

namespace tecno;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
     return $this->belongsToMany('tecno\User');	
    }
}
