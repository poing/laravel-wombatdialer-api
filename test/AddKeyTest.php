<?php

namespace WombatDialer\Test;

class AddKeyTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAddKey()
    {

       //test addKey()
        $key = new \WombatDialer\Controllers\Addkey;

        $show = $key->addKey('add', 'ABCD: 3455');
        $this->assertIsArray($show, 'The response is not an array');
    }
}
