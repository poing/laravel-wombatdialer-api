<?php

namespace WombatDialer\Test;

class CampaignTrunkTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCampaignTrunk()
    {
        //create and test Campaign API
        $campaign = new \WombatDialer\Controllers\Edit\Campaign;
        $campaignData = [
            'name' => 'Omega',
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
        $this->assertContains('Omega', $campaignCreate['results'][0], 'The Value is not present in the array');

        // test create CampaignEp
        $record = new \WombatDialer\Controllers\Edit\Campaign\Trunk;
        $data = [
            'trunkId'=> [
                'trunkId' => 1,
            ],
        ];
        $add = $record->addRecord($campaignId, $data);
        $this->assertIsArray($add, 'The response is not an array');
       // $this->assertArrayHasKey('campaignId', $add['results'][0], 'The Value is not present in the array');

        // test indexRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Trunk;
        $index = $record->indexRecord($campaignId);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        // test showRecord()
        $show = new \WombatDialer\Controllers\Edit\Campaign\Ep;
        $index = $show->showRecord($campaignId);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        //test updateRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Trunk;
        $data = [
            'trunkId' => 1,
            'astId' => [
                'id' => 1,
            ],
            'name' => 'Lambda',
            'dialstring' => 'Local/${num}@from-internal/n',
            'capacity'  =>  10,
            'securityKey' => '',
        ];
        $data['name'] = 'Quantum';
        $update = $record->update($data);
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertTrue(true);

        //test deleteRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Trunk;
        $data = [
            'trunkId'=> [
                'trunkId' => 1,
            ],
        ];
        $destroy = $record->destroyRecord($campaignId, $data);
        $this->assertIsArray($destroy, 'The response is not an array');
        //$this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');
    }
}
