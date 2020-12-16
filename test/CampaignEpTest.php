<?php

namespace WombatDialer\Test;

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
                'epId' => 1,
            ],
        ];
        $add = $record->addRecord(1, $data);
        $campId = $add['results'][0]['campaignId'];
        $this->assertIsArray($add, 'The response is not an array');
        $this->assertArrayHasKey('campaignId', $add['results'][0], 'The Value is not present in the array');

        // test indexRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Ep;
        $index = $record->indexRecord($campId);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        // test showRecord()
        $disp = new \WombatDialer\Controllers\Edit\Campaign\Ep;
        $index = $disp->showRecord($campId);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        //test updateRecord()
        $record = new \WombatDialer\Controllers\Edit\Campaign\Ep;
        $data = [
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
            'description' => 'LambdaTest',
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
                'epId' => 1,
            ],
        ];
        $destroy = $record->destroyRecord($campId, $data);
        $this->assertIsArray($destroy, 'The response is not an array');
        // $this->assertArrayNotHasKey('status', $index, 'The Key is not present in the given array');
    }
}
