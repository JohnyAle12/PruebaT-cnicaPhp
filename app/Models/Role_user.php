<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{

	protected $fillable = [
        'user_id', 'role_id'
    ];

   	protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'role_id' => 'integer'
    ];

    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }

    public function users(){
		return $this->belongsToMany('App\Models\User');
    }
}
