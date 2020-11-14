<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
	use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'address', 'gender', 'bith_date'
    ];

    //este metodo sobreescribe el campo por el que realziaremos consultas al modelo
    public function getRouteKeyName()
    {
        return 'id';
    }

    /*protected $dispatchesEvents = [
    	'updated' => App\Events\CustomerUpdated::class,
    ];*/

    public function users(){
    	return $this->belongsTo('App\Models\User');
    }
}
