<?php

namespace WombatDialer\Test;

class EpTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEp()
    {
        // test create asterisk
        $asterisk = new \WombatDialer\Controllers\Edit\asterisk;
        $data = [
            'description' => 'HenryTest',
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
        $this->assertContains('HenryTest', $create['results'][0], 'The Value is not present in the array');

        //create TrunkAPI and test TrunkAPI
        $Ep = new \WombatDialer\Controllers\Edit\Ep;
        $epData = [
            'type' => 'PHONE',
            'queueName' => '',
            'name' => 'DefaultSample',
            'astId' => [
                'id' => $astId,
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
            $epCreate = $Ep->create($epData);
            $epId = $epCreate['results'][0]['epId'];
            $this->assertIsArray($epCreate, 'The response is not an array');
            $this->assertContains('Bravo', $epCreate['results'][0], 'The Value is not present in the array');

            //test show()
            $epShow = new \WombatDialer\Controllers\Edit\Ep;
            $show = $epShow->show($epId);
            $this->assertIsArray($show, 'The response is not an array');
            $this->assertCount(22, $show, 'The  Number of records does not matches the given count');

            //test index()
            $epIndex = new \WombatDialer\Controllers\Edit\Ep;
            $index = $epIndex->index();
            $this->assertIsArray($index, 'The response is not an array');
            $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

            //test update()
            $epUpdate = new \WombatDialer\Controllers\Edit\Ep;
            $epData = [
                'epId' => $epId,
                'type' => 'PHONE',
                'queueName' => '',
                'name' => '',
                'astId' => [
                    'id' => $astId,
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
                $epData['description'] = 'LambdaTest';
                $update = $epUpdate->update($epData);
                $this->assertIsArray($update, 'The response is not an array');
                $this->assertContains('LambdaTest', $update['results'][0], 'The Value does not exists in the record');

                //test delete Asterisk
                $asteriskDelete = new \WombatDialer\Controllers\Edit\asterisk;
                $error = $asteriskDelete->destroy($astId);
                $this->assertIsArray($error, 'The response is not an array');
                $this->assertFalse(false);

                //test delete Ep
                $epDelete = new \WombatDialer\Controllers\Edit\Ep;
                $destroy = $epDelete->destroy($epId);
                $this->assertIsArray($destroy, 'The response is not an array');
                $this->assertArrayNotHasKey('id', $destroy, 'The  Key is not present in the record');
    }
}
