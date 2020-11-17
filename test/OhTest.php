<?php

namespace WombatDialer\Test;

class OhTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testOh()
    {

     //create and test Oh API
        $oh = new \WombatDialer\Controllers\Edit\Oh;
        $ohData = [
            'securityKey' => '',
            'name' => 'Amp',
            'defaultMode' => 'DEF_OPEN',
            'comment' => 'Amp Test for Dev',
            'hidden' => false,
        ];
        $ohCreate = $oh->create($ohData);
        $openingHourId = $ohCreate['results'][0]['openingHourId'];
        $this->assertIsArray($ohCreate, 'The response is not an array');
        $this->assertContains('Amp', $ohCreate['results'][0], 'The Value is not present in the array');

        //test show()
        $ohShow = new \WombatDialer\Controllers\Edit\Oh;
        $show = $ohShow->show($openingHourId);
        $this->assertIsArray($show, 'The response is not an array');
        $this->assertCount(11, $show, 'The  Number of records does not matches the given count');

        //test index()
        $ohIndex = new \WombatDialer\Controllers\Edit\Oh;
        $index = $ohIndex->index();
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        //test update()
        $ohUpdate = new \WombatDialer\Controllers\Edit\Oh;
        $ohData = [
            'securityKey' => '',
            'name' => 'Amp',
            'openingHourId'=> $openingHourId,
            'defaultMode' => 'DEF_OPEN',
            'comment' => 'Amp Test for Dev',
            'hidden' => false,
        ];
        $ohData['name'] = 'AlphaTest';
        $update = $ohUpdate->update($ohData);
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertContains('AlphaTest', $update['results'][0], 'The Value does not exists in the record');

        //test delete Ep
        $ohDelete = new \WombatDialer\Controllers\Edit\Oh;
        $destroy = $ohDelete->destroy($openingHourId);
        $this->assertIsArray($destroy, 'The response is not an array');
        $this->assertArrayNotHasKey('openingHourId', $destroy, 'The  Key is not present in the record');
    }
}
