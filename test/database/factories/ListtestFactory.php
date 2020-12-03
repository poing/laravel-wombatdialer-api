<?php

namespace WombatDialer\Test\Database\Factories;

use Faker\Generator as Faker;
use WombatDialer\Test\Models\listtest;

$factory->define(listtest::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'value' => $faker->numberBetween(1000, 9999),
    ];
});
