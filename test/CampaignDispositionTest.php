<?php

namespace WombatDialer\Test;

class CampaignDispositionTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDisposition()
    {
        // test create dispositiom
        $rules = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $data = [
            'onState' => 'IN_HOPPER',
            'onExtState' => '',
            'withRetriesPending' => 0,
            'verb' => 'ADD_LIST',
            'destination' => 'ListTest',
            'text' => '',
            'deferSec' => 0,
            'varMode' => 'ALL',
            'addlVars' => '',
        ];
        $addRules = $rules->addRules(1, $data);
        $disId = $addRules['results'][0]['dispositionId'];
        $this->assertIsArray($addRules, 'The response is not an array');
        $this->assertContains('ListTest', $addRules['results'][0], 'The Value is not present in the array');

        // test indexRules()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $index = $disp->indexRules(1);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        //test updaterules()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $data = [
            'dispositionId' => $disId,
            'onState' => 'IN_HOPPER',
            'onExtState' => '',
            'withRetriesPending' => 0,
            'verb' => 'ADD_LIST',
            'destination' => 'ListTest',
            'text' => '',
            'deferSec' => 0,
            'varMode' => 'ALL',
            'addlVars' => '',
        ];
        $data['onState'] = 'SCHEDULED';
        $update = $disp->updateRules(1, $data);
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertContains('SCHEDULED', $update['results'][0], 'The Value does not exists in the record');

        //test deleterules()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $data = [
            'dispositionId' => $disId,
        ];
        $destroy = $disp->destroyRules(1, $data);
        $this->assertIsArray($destroy, 'The response is not an array');
        $this->assertFalse(false);

        // test moveUp()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $data = [
            'dispositionId' => $disId,
        ];
        $up = $disp->moveUp(1, $data);
        $this->assertIsArray($up, 'The response is not an array');
        $this->assertTrue(true);

        //test moveDown()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $data = [
            'dispositionId' => $disId,
        ];
        $down = $disp->moveDown(1, $data);
        $this->assertIsArray($down, 'The response is not an array');
        $this->assertTrue(true);
    }
}
