<?php

namespace WombatDialer\Test;

class RecallInfoTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRecall()
    {

       //test RecallInfo()
        $info = new \WombatDialer\Controllers\RecallInfo;

        $show = $info->recall();
        $this->assertIsArray($show, 'The result is not an array');
        $this->assertArrayHasKey('reschedule_late_limit_sec', $show, 'The Key is not present in an array');
    }
}
