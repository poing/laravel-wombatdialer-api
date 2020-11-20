<?php

namespace WombatDialer\Test;

class CallInfoTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCallInfo()
    {

       //test addKey()
        $info = new \WombatDialer\Controllers\CallInfo;

        $show = $info->callInfo(1);
        $this->assertIsArray($show, 'The response is not an array');
        $this->assertarrayHasKey('isLive', $show, 'Array does not have the key');
    }
}
