<?php

namespace WombatDialer\Test\Database\Seeders;

use Illuminate\Database\Seeder;
use WombatDialer\Test\Models\listtest;

class ListtestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(listtest::class, 1000)->create();
    }
}
