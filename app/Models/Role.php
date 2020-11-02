<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
        'name', 'description'
    ];

    public function role_users(){
        return $this->belongsToMany('App\Models\Role_user');
    }
}
