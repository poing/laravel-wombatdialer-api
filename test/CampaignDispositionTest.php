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
        // create Campaign
        $campaign = new \WombatDialer\Controllers\Edit\Campaign;
        $campaignData = [
            'name' => 'Henry',
            'priority' => 10,
            'pace'=> 'RUNNABLE',
            'dial_timeout' => 30000,
            'dial_clid' => '',
            'dial_account' =>  '',
            'dial_pres' => '',
            'addlLogging' => 'QM_COMPATIBLE',
            'pauseWhenFinished' => 0,
            'timeStartHr' => '000000',
            'timeEndHr' => '235959',
            'timeDow' => '345',
            'maxCallLength' => 0,
            'batchSize' => 1,
            'httpNotify' => 'https://example.com',
            'loggingAlias' => '',
            'securityKey' => 'admin',
            'autopause' => false,
            'agentClid' => '',
            'emailAddresses' => '',
            'emailEvents' => 'NO',
            'initialBoostFactor' => 1,
            'initialPredictiveModel' =>  'OFF',
            'amdTracking' => 'OFF',
            'amdParams' => '',
            'amdAudioFile' => '',
            'amdFaxFile' => '',
            'campaignVars' => '',
            'loggingQmVars'=> '',
        ];
        $campaignCreate = $campaign->create($campaignData);
        $campaignId = $campaignCreate['results'][0]['campaignId'];
        $this->assertIsArray($campaignCreate, 'The response is not an array');
        $this->assertContains('Henry', $campaignCreate['results'][0], 'The Value is not present in the array');

        // test create dispositiom
        $rules = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $data = [
            'onState' => 'DIALLING',
            'onExtState' => '',
            'withRetriesPending' => 0,
            'verb' => 'ADD_LIST',
            'destination' => 'CharlieTest',
            'text' => '',
            'deferSec' => 0,
            'varMode' => 'ALL',
            'addlVars' => '',
        ];

        $addRules = $rules->addRules($campaignId, $data);
        $this->assertNull($rules->checkDispData($data), 'The value is not null');
        $disId = $addRules['results'][0]['dispositionId'];
        $campId = $addRules['results'][0]['campaignId'];

        $this->assertIsArray($addRules, 'The response is not an array');
        //$this->assertContains('CharlieTest', $addRules['results'][0], 'The Value is not present in the array');

        // test indexRules()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $index = $disp->indexRules($campId);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        // test showRules()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $index = $disp->showRules($campId);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        //test updaterules()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $data = [
            'dispositionId' => $disId,
            'onState' => 'DIALLING',
            'onExtState' => '',
            'withRetriesPending' => 0,
            'verb' => 'ADD_LIST',
            'destination' => 'CharlieTest',
            'text' => '',
            'deferSec' => 0,
            'varMode' => 'ALL',
            'addlVars' => '',
        ];
        $data['onState'] = 'SCHEDULED';
        $update = $disp->updateRules($campId, $data);
        $this->assertNull($disp->checkDispData($data), 'The value is not null');
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertContains('SCHEDULED', $update['results'][0], 'The Value does not exists in the record');

        //test deleterules()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $data = [
            'dispositionId' => $disId,
        ];
        $destroy = $disp->destroyRules($campId, $data);
        $this->assertIsArray($destroy, 'The response is not an array');
        $this->assertFalse(false);

        // test moveUp()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $data = [
            'dispositionId' => $disId,
        ];
        $up = $disp->moveUp($campId, $data);
        $this->assertIsArray($up, 'The response is not an array');
        $this->assertTrue(true);

        //test moveDown()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Disposition;
        $data = [
            'dispositionId' => $disId,
        ];
        $down = $disp->moveDown($campId, $data);
        $this->assertIsArray($down, 'The response is not an array');
        $this->assertTrue(true);
    }
}
