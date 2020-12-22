<?php

namespace WombatDialer\Test;

class CampaignRescheduleTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testReschedule()
    {
        // create Campaign
        $campaign = new \WombatDialer\Controllers\Edit\Campaign;
        $campaignData = [
            'name' => 'Proton',
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
        $this->assertContains('Proton', $campaignCreate['results'][0], 'The Value is not present in the array');

        // test create Reschedule
        $rules = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
        $data = [
            'rescheduleRuleId' => null,
            'status' => 'RS_NOANSWER',
            'statusExt' => '',
            'maxAttempts' => 1,
            'retryAfterS' => 120,
            'mode' => 'FIXED',
        ];
        $addRules = $rules->addRules($campaignId, $data);
        $reschId = $addRules['results'][0]['rescheduleRuleId'];
        $campId = $addRules['results'][0]['campaignId'];
        $this->assertNull($rules->checkRulesData($data), 'The value is not null');
        $this->assertIsArray($addRules, 'The response is not an array');

        // test indexRules()
        $resch = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
        $index = $resch->indexRules($campId);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        // test showRules()
        $resch = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
        $index = $resch->showRules($campId);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        //test updaterules()
        $resch = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
        $data = [
            'rescheduleRuleId' => $reschId,
            'status' => 'RS_NOANSWER',
            'statusExt' => '',
            'maxAttempts' => 1,
            'retryAfterS' => 120,
            'mode' => 'FIXED',
        ];
        $data['status'] = 'SCHEDULED';
        $update = $resch->updateRules($campId, $data);
        $this->assertNull($rules->checkRulesData($data), 'The value is not null');
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertContains('SCHEDULED', $update['results'][0], 'The Value does not exists in the record');

        //test deleterules()
        $resch = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
        $data = [
            'rescheduleRuleId' => $reschId,
        ];
        $destroy = $resch->destroyRules($campId, $data);
        $this->assertIsArray($destroy, 'The response is not an array');
        $this->assertFalse(false);

        // test moveUp()
        $resch = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
        $data = [
            'rescheduleRuleId' => $reschId,
        ];
        $up = $resch->moveUp($campId, $data);
        $this->assertIsArray($up, 'The response is not an array');
        $this->assertTrue(true);

        //test moveDown()
        $resch = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
        $data = [
            'rescheduleRuleId' => $reschId,
        ];
        $down = $resch->moveDown($campId, $data);
        $this->assertIsArray($down, 'The response is not an array');
        $this->assertTrue(true);
    }
}
