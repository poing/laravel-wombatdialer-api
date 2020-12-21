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
        // create Campaign
        $campaign = new \WombatDialer\Controllers\Edit\Campaign;
        $campaignData = [
            'name' => 'Faraday',
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
        $this->assertContains('Faraday', $campaignCreate['results'][0], 'The Value is not present in the array');

        // test create CampaignOh
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $data = [
            'rule'=>[
                'openingHourId' => 1,
            ],
        ];
        $add = $record->addRecord($campaignId, $data);
        $campId = $add['results'][0]['campaignId'];
        $cohId = $add['results'][0]['cohId'];
        $this->assertIsArray($add, 'The response is not an array');
        $this->assertArrayHasKey('campaignId', $add['results'][0], 'The Value is not present in the array');

        // test indexRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $index = $record->indexRecord($campId);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        // test showRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $show = $record->showRecord($campId);
        $this->assertIsArray($show, 'The response is not an array');
        $this->assertArrayHasKey('status', $show, 'The Key is not present in the given array');

        //test updateRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $data = [
            'securityKey' => '',
            'name' => 'Alpha',
            'openingHourId'=> 1,
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
        $destroy = $record->destroyRecord($campId, $data);
        $this->assertIsArray($destroy, 'The response is not an array');
        // $this->assertArrayNotHasKey('status', $index, 'The Key is not present in the given array');

        //test moveUP()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $data = ['cohId' => $cohId];
        $up = $record->moveUp($campId, $data);
        $this->assertIsArray($up, 'The response is not an array');
        $this->assertTrue(true);

        //test moveDown()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Oh;
        $data = ['cohId' => $cohId];
        $down = $record->moveDown($campId, $data);
        $this->assertIsArray($down, 'The response is not an array');
        $this->assertTrue(true);
    }
}
