<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;

class CampaignTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function testCampaign()
      {
     
     
     //create and test Oh API
     $campaign = new \WombatDialer\Controllers\Edit\Campaign;
     $campaignData =[
        'name' => 'Gamma',
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
      $this->assertContains('Gamma', $campaignCreate['results'][0], 'The Value is not present in the array');
     
    //test show()
        $campaignShow = new \WombatDialer\Controllers\Edit\Campaign;
        $show = $campaignShow->show($campaignId);
        $this->assertIsArray($show, 'The response is not an array');
        $this->assertCount(34, $show, 'The  Number of records does not matches the given count');
    
     //test index()
        $campaignIndex = new \WombatDialer\Controllers\Edit\Campaign;
        $index = $campaignIndex->index();
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');
        
      //test update()
        $campaignUpdate = new \WombatDialer\Controllers\Edit\Campaign;
        $campaignData =  [
        'campaignId' => $campaignId,
        'name' => 'Gamma',
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
        $campaignData['name'] = 'AlphaTest';
        $update = $campaignUpdate->update($campaignData);
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertContains('AlphaTest', $update['results'][0] , 'The Value does not exists in the record');
        
    
      //test delete Campaign
        $campaignDelete = new \WombatDialer\Controllers\Edit\Campaign;
        $destroy = $campaignDelete->destroy($campaignId);
        $this->assertIsNotArray($destroy, 'The response is an array');
        $this->assertFalse(false);
        
     //test setDow
        $campaignDow = new \WombatDialer\Controllers\Edit\Campaign;
        $data =  [
        'campaignId' => $campaignId,
        'name' => 'Gamma',
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
        'timeDow' => [3,4,5],
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
        $setDow = $campaignDow->setDow($data);
        $this->assertContains('456', $setDow,  'The response is not an array');
        $this->assertIsArray($setDow, 'The response is not an array');
     
     //test getDow
        $campaignDow = new \WombatDialer\Controllers\Edit\Campaign;
        $data =  [
        'campaignId' => $campaignId,
        'name' => 'Gamma',
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
        'timeDow' => '234',
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
        $getDow = $campaignDow->getDow($data);
        $this->assertIsArray($getDow['timeDow'], 'The response is not an array');
 }
 
}

