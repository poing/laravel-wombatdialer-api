<?php

namespace WombatDialer\Test;

class LiveCallsTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLiveCalls()
    {

       //test LiveCalls()
        $live = new \WombatDialer\Controllers\Live\Calls;

        $show = $live->liveCalls();
        $this->assertTrue(true);
        $this->assertIsArray($show, 'The result is not an array');
        $this->assertArrayHasKey('isRunning', $show['result']['campaigns'][0], 'The array does not contain the key');

        // test ShowLiveCalls
        $live = new \WombatDialer\Controllers\Live\Calls;

        $show = $live->showliveCalls();
        $this->assertTrue(true);
        $this->assertIsArray($show, 'The result is not an array');
        $this->assertArrayHasKey('isRunning', $show['result']['campaigns'][0], 'The array does not contain the key');
    }
}
