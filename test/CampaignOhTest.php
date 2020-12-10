<?php

namespace WombatDialer\Test;

class CampaignOhTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCampaignOh()
    {
        // test create CampaignOh
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $data = [
            'rule'=>[
                'openingHourId' => 1,
            ],
        ];
        $add = $record->addRecord(1, $data);
        //$campId = $add['results'][0]['campaignId'];
        $cohId = $add['results'][0]['cohId'];
        $this->assertIsArray($add, 'The response is not an array');
        $this->assertArrayHasKey('campaignId', $add['results'][0], 'The Value is not present in the array');

        // test indexRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $index = $record->indexRecord(1);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        // test showRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $show = $record->showRecord(1);
        $this->assertIsArray($show, 'The response is not an array');
        $this->assertArrayHasKey('status', $show, 'The Key is not present in the given array');

        //test updateRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $data = [
            'securityKey' => '',
            'name' => 'Ohio',
            'openingHourId'=> 28,
            'defaultMode' => 'DEF_OPEN',
            'comment' => 'Alpha Test for Dev',
            'hidden' => false,
        ];
        $data['name'] = 'frequency';
        $update = $record->update($data);
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertTrue(true);

        //test deleteRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $data = ['cohId' => $cohId];
        $destroy = $record->destroyRecord(1, $data);
        $this->assertIsArray($destroy, 'The response is not an array');
        // $this->assertArrayNotHasKey('status', $index, 'The Key is not present in the given array');

        //test moveUP()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $data = ['cohId' => $cohId];
        $up = $record->moveUp(1, $data);
        $this->assertIsArray($up, 'The response is not an array');
        $this->assertTrue(true);

        //test moveDown()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $data = ['cohId' => $cohId];
        $down = $record->moveDown(1, $data);
        $this->assertIsArray($down, 'The response is not an array');
        $this->assertTrue(true);
    }
}
