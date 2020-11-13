<?php

namespace WombatDialer\Test;

class AsteriskTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testURL()
    {
        // test URL
        $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
        $this->assertFalse('http://localhost:8080/wombat/api' == $asterisk->connection(), 'WOMBAT_HOST environment variable not set');
    }

    public function testAsterisk()
    {
        // test create
        $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
        $data = [
            'description' => 'BravoTest',
            'serverType' => 'ASTERISKAMI',
            'ipAddress' => '10.10.10.10',
            'login' => 'username',
            'password' => 'password',
            'port' => 5038,
            'unit_len' => 50,
            'msg_per_unit' => 5,
            'securityKey' => 'TestAsterisk',
            'state' => 'DOWN',
        ];
        $create = $asterisk->create($data);
        $this->assertIsArray($create, 'The response is not an array');
        $this->assertContains('BravoTest', $create['results'][5], 'The Value is not present in the array');

        //test show()
        $id = 290;
        $show = $asterisk->show($id);
        $this->assertIsArray($show, 'The response is not an array');
        $this->assertCount(15, $show, 'The  Number of records does not matches the given count');

        //test index()
        $index = $asterisk->index();
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        //test update()
        $data = [
            'id' => 293,
            'description' => 'BravoTest',
            'serverType' => 'ASTERISKAMI',
            'ipAddress' => '10.10.10.10',
            'login' => 'username',
            'password' => 'password',
            'port' => 5038,
            'unit_len' => 50,
            'msg_per_unit' => 5,
            'securityKey' => 'TestAsterisk',
            'state' => 'DOWN',
        ];
        $data['description'] = 'Ferry';
        $update = $asterisk->update($data);
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertArrayHasKey('allResults', $update, 'The Value does not exists in the record');

        //test destroy()
        $id = 299;
        $destroy = $asterisk->destroy($id);
        $this->assertIsArray($destroy, 'The response is not an array');
        $this->assertArrayNotHasKey('id', $destroy, 'The  Key is not present in the record');
    }
}
