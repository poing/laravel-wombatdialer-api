<?php

namespace WombatDialer\Test;

class LiveRunsTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLiveRuns()
    {

       //test LiveCalls()
        $runs = new \WombatDialer\Controllers\Live\Runs;

        $show = $runs->liveRuns();
        $this->assertTrue(true);
        $this->assertIsArray($show, 'The result is not an array');
        $this->assertArrayHasKey('status', $show, 'The array does not contain the key');

        // test ShowLiveRUNS
        $live = new \WombatDialer\Controllers\Live\Runs;

        $show = $live->showliveRuns();
        $this->assertTrue(true);
        $this->assertIsArray($show, 'The result is not an array');
        $this->assertArrayHasKey('status', $show, 'The array does not contain the key');
    }
}
