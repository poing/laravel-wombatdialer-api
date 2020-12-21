<?php

namespace WombatDialer\Test;

use WombatDialer\Test\Models\listtest;

class ListsTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testModelCount()
    {
        $listAPI = new \WombatDialer\Controllers\Edit\Lists;
        $myList = $listAPI->create(['name' => 'YenList'.time(), 'securityKey' => 'TestLists']);
        $listName = $myList['results'][0]['name'];
        factory(listtest::class, 5000)->create();
        $this->assertEquals(listtest::count(), 5000, 'The count does not matches');
        listtest::chunk(50, function ($records) use ($listName) {
            $this->assertEquals(50, $records->count(), 'The count does not matches');
            $column = 'value';

            //formatTableData
            $lists = new \WombatDialer\Controllers\Lists;
            $data = $lists->formatTableData($records, $column);
            //print_r($data);
            $this->assertEquals(50, count($data));

            //To implode
            $listsAPI = new \WombatDialer\Controllers\Lists;
            $string = $listsAPI->myImplode($data);
            //echo $string;
            $this->assertIsString($string);

            //To addToList
            $listToList = new \WombatDialer\Controllers\Lists;
            $response = $listToList->addToList($listName, $string);
            //echo $response;
            $this->assertTrue($response->ok(), 'Something is wrong');
        });
    }
}
