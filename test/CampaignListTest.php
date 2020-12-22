<?php

namespace WombatDialer\Test;

class CampaignListTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCampaignList()
    {
        // create Campaign
        $campaign = new \WombatDialer\Controllers\Edit\Campaign;
        $campaignData = [
            'name' => 'Markus',
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
        $this->assertContains('Markus', $campaignCreate['results'][0], 'The Value is not present in the array');
        
        //create and test List API
      $list = new \WombatDialer\Controllers\Edit\Lists;
      $listData =[
        'name' => 'KenTest',
        'isHidden' => false,
        'securityKey' => '',
     ];
      $Create = $list->create($listData);
      //dd($Create);
      $listId = $Create['results'][0]['listId'];
      $this->assertIsArray($Create, 'The response is not an array'); 
      $this->assertContains('KenTest', $Create['results'][0], 'The Value is not present in the array');
     
        // test create CampaignEp
        $record = new \WombatDialer\Controllers\Edit\Campaign\Lists;
        $data = [
            'cl'=>[
                'listId' =>  $listId,
            ],
        ];
        $add = $record->addRecord($campaignId, $data);
        print_r($add);
        $this->assertIsArray($add, 'The response is not an array');
        //$this->assertArrayHasKey('campaignId', $add['results'][0], 'The Value is not present in the array');

        // test indexRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Lists;
        $index = $record->indexRecord($campaignId);
        $cclId = $index['results'][0]['cclId'];
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        // test showRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Lists;
        $show = $record->showRecord($campaignId);
        $this->assertIsArray($show, 'The response is not an array');
        $this->assertArrayHasKey('status', $show, 'The Key is not present in the given array');

        //test updateRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Lists;
        $listData = [
            'listId' => 1,
            'name' => 'MercuryTest',
            'isHidden' => false,
            'securityKey' => '',
        ];
        $listData['name'] = 'SachinTest';
        $update = $record->update($listData);
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertTrue(true);

        //test deleteRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Lists;
        $data = ['cclId' => $cclId];
        $destroy = $record->destroyRecord($campaignId, $data);
        $this->assertIsArray($destroy, 'The response is not an array');
        // $this->assertArrayNotHasKey('status', $index, 'The Key is not present in the given array');

        //test moveUP()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Lists;
        $data = ['cclId' => $cclId];
        $up = $record->moveUp($campaignId, $data);
        $this->assertIsArray($up, 'The response is not an array');
        $this->assertTrue(true);

        //test moveDown()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Lists;
        $data = ['cclId' => $cclId];
        $down = $record->moveDown($campaignId, $data);
        $this->assertIsArray($down, 'The response is not an array');
        $this->assertTrue(true);
    }
}
