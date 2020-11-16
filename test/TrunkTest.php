<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;

class TrunkTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function testTrunk()
      {
      // test create asterisk
      $asterisk = new \WombatDialer\Controllers\Edit\asterisk;
      $data = [
        'description' => 'CharlieTest',
        'serverType' => 'ASTERISKAMI',
        'ipAddress' => '10.10.10.10',
        'login' => 'username',
        'password' => 'password',
        'port' => 5038,
        'unit_len' => 50,
        'msg_per_unit' => 5,
        'securityKey' => 'TestAPI',
        'state' => 'DOWN',
     ];
      $create = $asterisk->create($data);
      $astId = $create['results'][0]['id'];
      $this->assertIsArray($create, 'The response is not an array'); 
      $this->assertContains('CharlieTest', $create['results'][0], 'The Value is not present in the array');
      
     //create TrunkAPI and test TrunkAPI
     $trunk = new \WombatDialer\Controllers\Edit\Trunk;
     $trunkData = [
        'astId' => [
            'id' =>  $astId
        ],
        'name' => 'Joules',
         'dialstring' => 'Local/${num}@from-internal/n',
         'capacity'  =>  10,
         'securityKey' => '',
      ];
      $trunkCreate = $trunk->create($trunkData);
      $trunkId = $trunkCreate['results'][0]['trunkId'];
      $this->assertIsArray($trunkCreate, 'The response is not an array'); 
      $this->assertContains('Joules', $trunkCreate['results'][0], 'The Value is not present in the array');
     
     //test show()
        $trunkShow = new \WombatDialer\Controllers\Edit\Trunk;
        $show = $trunkShow->show($trunkId);
        $this->assertIsArray($show, 'The response is not an array');
        $this->assertCount(13, $show, 'The  Number of records does not matches the given count');
    
    //test index()
        $trunkIndex = new \WombatDialer\Controllers\Edit\Trunk;
        $index = $trunkIndex->index();
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');
        
      //test update()
         $trunkUpdate = new \WombatDialer\Controllers\Edit\Trunk;
        $trunkData = [
        'astId' => [
            'id' =>  $astId
        ],
        'name' => 'Joules',
         'dialstring' => 'Local/${num}@from-internal/n',
         'capacity'  =>  10,
         'securityKey' => '',
      ];
        $trunkData['name'] = 'Lambda';
        $update = $trunkUpdate->update($trunkData);
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertContains('Lambda', $update['results'][0] , 'The Value does not exists in the record');
        
      //test delete Asterisk
      $asteriskDelete = new \WombatDialer\Controllers\Edit\asterisk;
      $error =  $asteriskDelete->destroy($astId);
      $this->assertIsArray($error, 'The response is not an array');
      $this->assertFalse(false);
      
      //test delete Trunk
        $trunkDelete = new \WombatDialer\Controllers\Edit\Trunk;
        $destroy = $trunkDelete->destroy($trunkId);
        $this->assertIsArray($destroy, 'The response is not an array');
        $this->assertArrayNotHasKey('id', $destroy, 'The  Key is not present in the record');
        
 }
 
}

