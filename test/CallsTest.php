<?php

namespace WombatDialer\Test;

class CallsTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCalls()
    {

       //test calls()
        $calls = new \WombatDialer\Controllers\Calls;

        $show = $calls->calls('addcall', 'Beta', '446666332');
        $this->assertTrue(true);
        $this->assertIsString($show, 'The response is not a string');
    }
}
