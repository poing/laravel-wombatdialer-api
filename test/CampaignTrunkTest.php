<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;

class CampaignTrunkTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function testCampaignTrunk()
      {
      // test create CampaignEp
      $record = new \WombatDialer\Controllers\Edit\Campaign\Trunk;
      $data = [
      'trunkId'=> [
         'trunkId' => 3
         ]
     ];
      $add = $record->addRecord(1, $data);
      $campId = $add['results'][0]['campaignId'];
      $this->assertIsArray($add, 'The response is not an array'); 
      $this->assertArrayHasKey('campaignId', $add['results'][0], 'The Value is not present in the array');
      
     // test indexRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Trunk;
        $index = $record->indexRecord($campId);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');
        
        
       // test showRecord()
        $show = new \WombatDialer\Controllers\Edit\Campaign\Ep;
        $index = $show->showRecord($campId);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');
        
          
      //test updateRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Trunk;
        $data =  [
        'trunkId' => 3,
        'astId' => [
            'id' => 4, 
        ],
        'name' => 'TestCheck',
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
         'trunkId' => 1
         ]
        ];
        $destroy = $record->destroyRecord($campId, $data);
        $this->assertIsArray($destroy, 'The response is not an array');
        //$this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');
        
      
     
    
        
 }
 
}

