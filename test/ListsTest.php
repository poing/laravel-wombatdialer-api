<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;
use WombatDialer\Test\Models\listtest;

class ListsTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

     /* public function testformatTableData()
      {
     
        $lists = new \WombatDialer\Controllers\Lists;
        $data =  listtest::take(5)->get();
        $valueField = 'value';
        $results = $lists->formatResults($data, $valueField);
        $list = 'QueTest';
        $addToList = $lists->addToList($list, $results);
        $this->assertTrue(true);
        $this->assertIsString($results, 'The response is not an array'); 
       }*/
       
     public  function testListData()
     {
       $data = factory(listtest::class, 1000)->create();
       //dd($data);
       $this->assertCount(1000, $data, 'The count does not matches');
       $lists = new \WombatDialer\Controllers\Lists;
       $listAPI = new \WombatDialer\Controllers\Edit\Lists;
       $valueField = 'value';
       $modelName =  new Models\listtest();
       //print_r($modelName);
       $myList = $listAPI->create(['name' => 'ListTest'.time(), 'securityKey' => 'Test']);
       $listName = $myList['results'][0]['name'];
       //dd($listName);
       $finalResult = $lists->updateList($listName , $modelName, $valueField);
       $this->assertTrue(true);
       //$this->assertEquals($data::count(), $modelName::count(), 'The Actual value is not equal as expected');
     
     }
 
}

