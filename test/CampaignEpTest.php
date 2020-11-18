<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;

class CampaignEpTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function testCampaignEp()
      {
      // test create CampaignEp
      $record = new \WombatDialer\Controllers\Edit\Campaign\Ep;
      $data = [
      'epId'=> [
         'epId' => 1
         ]
     ];
      $add = $record->addRecord(1, $data);
      $this->assertIsArray($add, 'The response is not an array'); 
      $this->assertArrayHasKey('campaignId', $add['results'][0], 'The Value is not present in the array');
      
     // test indexRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Ep;
        $index = $record->indexRecord(1);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');
        
      //test updateRecord()
        $record = new \WombatDialer\Controllers\Edit\Ep;
        $data =  [
        'epId' => 1,
        'type' => 'PHONE',
        'queueName' => '',
        'name' => '',
        'astId' => [
            'id' => 1,
        ],
        'idx' => '',
        'campaignId' => '',
        'maxChannels'  => 1,
        'extension' => '9999',
        'context' => 'default',
        'boostFactor' => 1,
        'maxWaitingCalls' => 2,
        'reverseDialing' => false,
        'stepwiseReverse' => false,
        'securityKey' => 'Ferry',
        'description' => 'Bravo',
        'dialFind' => '',
        'dialReplace' => '',
         ];
        $data['description'] = 'Henry';
        $update = $record->update($data);
        $this->assertIsArray($update, 'The response is not an array');
        
        
      //test deleteRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Ep;
         $data = [
         'epId'=> [
         'epId' => 1
         ]
        ];
        $destroy = $record->destroyRecord(1, $data);
        $this->assertIsArray($destroy, 'The response is not an array');
        //$this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');
        
      
     
    
        
 }
 
}

