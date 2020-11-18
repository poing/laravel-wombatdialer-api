<?php

namespace WombatDialer\Test;

class InspectDialerTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testInspectDialer()
    {

       //test inspectDialer()
        $dialer = new \WombatDialer\Controllers\InspectDialer;

        $show = $dialer->inspectDialer('LIVE_CALLS');
        $this->assertTrue(true);
        $this->assertIsArray($show, 'The result is not an array');
    }
}
