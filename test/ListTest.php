<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;

class ListTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function testList()
      {
     
     
     //create and test List API
     $list = new \WombatDialer\Controllers\Edit\Lists;
     $listData =[
        'name' => 'BravoTest',
        'isHidden' => false,
        'securityKey' => '',
    ];
      $Create = $list->create($listData);
      print_r($Create);
      $listId = $Create['results'][0]['listId'];
      $this->assertIsArray($Create, 'The response is not an array'); 
      $this->assertContains('BravoTest', $Create['results'][0], 'The Value is not present in the array');
     
    //test show()
        $Show = new \WombatDialer\Controllers\Edit\Lists;
        $show = $Show->show($listId);
        $this->assertIsArray($show, 'The response is not an array');
        $this->assertCount(8, $show, 'The  Number of records does not matches the given count');
    
     //test index()
        $Index = new \WombatDialer\Controllers\Edit\Lists;
        $index = $Index->index();
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');
        
      //test update()
        $Updatelist = new \WombatDialer\Controllers\Edit\Lists;
        $listData =  [
        'listId' => $listId,
         'name' => 'BravoTest',
        'isHidden' => false,
        'securityKey' => '',
         ];
        $listData['name'] = 'LouisTest';
         
        $update = $Updatelist->update($listData);
        print_r($update);
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertContains('LouisTest', $update['results'][0] , 'The Value does not exists in the record');
        
    
      //test delete List
        $Delete = new \WombatDialer\Controllers\Edit\Lists;
        $destroy = $Delete->destroy(1);
        $this->assertIsArray($destroy, 'The response is not an array');
        $this->assertArrayNotHasKey('listId', $destroy, 'The  Key is not present in the record');
        
 }
 
}

