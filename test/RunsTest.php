<?php

namespace WombatDialer\Test;

class RunsTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRuns()
    {

       //test Runs()
        $runs = new \WombatDialer\Controllers\Runs;

        $show = $runs->runsInfo([2, 455, 66]);
        $this->assertTrue(true);
        $this->assertIsString($show, 'The response is not a string');
    }
}
