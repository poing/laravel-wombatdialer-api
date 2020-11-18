<?php

namespace WombatDialer\Test;

class RunListsTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRunLists()
    {

       //test  a RunList()
        $run = new \WombatDialer\Controllers\RunLists;

        $show = $run->listOperations('start', 'Beta', 'ListTest');
        $this->assertTrue(true);
        $this->assertIsString($show, 'The response is not a string');

        //test a list on a running campaign
        $run = new \WombatDialer\Controllers\RunLists;
        $show = $run->showLists('list', 'Beta');
        $this->assertTrue(true);
        $this->assertIsString($show, 'The response is not a string');
    }
}
