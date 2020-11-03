<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [ 'description' ];

    public function users(){
		return $this->belongsToMany('App\Models\User');
    }
}
