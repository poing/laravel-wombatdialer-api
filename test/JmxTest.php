<?php

namespace WombatDialer\Test;

class JmxTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testJmx()
    {

       //test Jmx()
        $jmx = new \WombatDialer\Controllers\Sysup\Jmx;

        $show = $jmx->indexJmx();
        $this->assertTrue(true);
        $this->assertIsArray($show, 'The result is not an array');
    }
}
