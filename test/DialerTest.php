<?php

namespace WombatDialer\Test;

class DialerTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDialer()
    {

       //test Dialer()
        $dial = new \WombatDialer\Controllers\Dialer;

        $show = $dial->options('start');
        $this->assertTrue(true);
        $this->assertIsString($show, 'The response is not a string');
    }
}
