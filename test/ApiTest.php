<?php

namespace WombatDialer\test;

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public function testConfig()
    {
        $value = 'demoadmin';
        $this->assertEquals($value, config('wombatdialer.admin.user'));
    }
}
