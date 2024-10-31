<?php

namespace tecno;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public function roles(){
        return $this->belongsToMany('tecno\Role');
    }
    public function authorizeRoles($roles){
        if (is_array($roles)) {
            $isAuthorize = false;
            foreach ($roles as $rol) {
                if($this->hasRole($rol)) {
                  $isAuthorize = true;
                }
            } 
            return ( $this->hasAnyRole($roles) ||  $isAuthorize ) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles){
         if(is_array($roles)){
            foreach ($roles as $role) {
              if($this->hasRole($roles)){
                return true;
            }
            }

         }else{
            if($this->hasRole($roles)){
                return true;
            }
         }
         return false;
    }

    public function hasRole($role){
      if($this->roles()->where('name',$role)->first()){
        return true;
      }
      return false;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','tel', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
}
