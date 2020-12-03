<?php

namespace WombatDialer\Test\Database\Factories;

use WombatDialer\Test\Models\listtest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


 $factory->define(listtest::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'value' => $faker->numberBetween(1000,9999)
    ];
});