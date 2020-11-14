<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'address' => $faker->address,
        'gender' => $faker->title('Male'),
        'bith_date' => $faker->dateTime,
        'users_id' => '1'
    ];
});
