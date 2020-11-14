<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug'
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

    public function role_users(){
        return $this->belongsToMany('App\Models\Role_user');
    }

    public function customers(){
        return $this->hasMany('App\Models\Customer');
    }

    public function autorizeRoles($roles){
        if($this->hasAnyRoles($roles)){
            return true;
        }
        abort(401, 'Esta acción no esta autorizada por tu perfil.');
    }

    public function hasAnyRoles($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
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
        $hasRole = Role_user::join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.name', $role)
            ->where('role_users.user_id', Auth::user()->id)
            ->first();
        if($hasRole){
            return true;
        }
        return false;
    }
}







