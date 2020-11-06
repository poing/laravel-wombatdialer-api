<?php

namespace WombatDialer\Test;

class MyAPITest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testConfigAccess()
    {
        $value = 'demoadmin';
        $this->assertEquals($value, config('wombatdialer.admin.user'));
    }
}
