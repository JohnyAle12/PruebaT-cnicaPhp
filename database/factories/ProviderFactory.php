<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence($nbWords = 5, $variableNbWords = true)
    ];
});
