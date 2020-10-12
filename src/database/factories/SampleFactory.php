<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use WombatDialer\Models\Sample;
use Faker\Generator as Faker;

$factory->define(WombatDialer\Models\Sample::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'value' => $faker->numberBetween(1000,9999)
    ];
});
