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

    /*protected $dispatchesEvents = [
    	'updated' => App\Events\CustomerUpdated::class,
    ];*/
}
