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
       
     public  function testListData()
     {
        
         factory(listtest::class, 1500)->create();
         //$model = listtest::class;
         $chunks = config('wombatdialer.chunk_size');
         $column = 'value';
         $counter = 0;
         $listAPI = new \WombatDialer\Controllers\Edit\Lists;
         $myList = $listAPI->create(['name' => 'ZeeList'.time(), 'securityKey' => 'Sample']);
         $listName = $myList['results'][0]['name'];
         listtest::chunk(100, function($records) use($listName, $column, $counter){
         echo $records->count();
         $this->assertEquals(100, $records->count(), 'The count does not matches');
         
         $lists = new \WombatDialer\Controllers\Lists;
         
         $data = $lists->formatTableData($records, $column);
          print_r($data);
         $this->assertIsArray($data);
         //$this->assertNotEquals(100, count($data, COUNT_RECURSIVE));
         $this->assertEquals(100, count($data));
         
         // To implode 
         $listsAPI = new \WombatDialer\Controllers\Lists;
         $string = $listsAPI->myImplode($data);
         $this->assertIsString($string);
         
         // to add To List
         $listToList = new \WombatDialer\Controllers\Lists;
         $response = $listToList->addToList($listName, $string);
         echo $response;
         //$this->assertTrue($response->ok(), 'Something is wrong');
        // $counter = $counter + 100;
         //$this->assertEquals($counter, 100);
        
        $modelName = new Models\listtest();
         $finalResult = $lists->updateList($listName, $modelName, $column);
         echo $finalResult;
         $this->assertTrue(true);
       
        });
     
     /* $chunks = config('wombatdialer.chunk_size');
        $data = factory(listtest::class, 700)->create();
       //dd($data);
       //$model = listtest::class();
       //$this->assertEquals($chunks, $data, 'The count does not matches');
       $lists = new \WombatDialer\Controllers\Lists;
       $listAPI = new \WombatDialer\Controllers\Edit\Lists;
       $valueField = 'value';
       $modelName =  new Models\listtest();
       //print_r($modelName);
       $myList = $listAPI->create(['name' => 'ZenTest1'.time(), 'securityKey' => 'Test']);
       $listName = $myList['results'][0]['name'];
       //dd($listName);
       $finalResult = $lists->updateList($listName , $modelName, $valueField);
       $this->assertTrue(true);*/
       //$this->assertEquals($chunks, $modelName::count(), 'The Actual value is not equal as expected');
     
     }
 
}

