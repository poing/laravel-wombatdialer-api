<?php

namespace WombatDialer\Test;

use Illuminate\Support\Facades\Mail;

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
            'description' => 'DeltaTest',
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
        $astId = $create['results'][0]['id'];
        $this->assertIsArray($create, 'The response is not an array');
        $this->assertContains('DeltaTest', $create['results'][0], 'The Value is not present in the array');

        //test show()
        $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
        $show = $asterisk->show($astId);
        $this->assertIsArray($show, 'The response is not an array');
        $this->assertCount(15, $show, 'The  Number of records does not matches the given count');

        //test index()
        $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
        $index = $asterisk->index();
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');

        //test update()
        $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
        $data = [
            'id' => $astId,
            'description' => 'DeltaTest',
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
        $this->assertContains('Ferry', $update['results'][0], 'The Value does not exists in the record');

        //test destroy()
        $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
        $destroy = $asterisk->destroy($astId);
        $this->assertIsArray($destroy, 'The response is not an array');
        $this->assertArrayNotHasKey('id', $destroy, 'The  Key is not present in the record');
    }

    /* public function testMailInfo($response)
      {
        $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
         Mail::fake();
         if ($response->failed() || $response->serverError() || $response->clientError()) {
          Mail::assertSent([], [], function ($message) use ($response) {
              //$message->to(config('wombatdialer.toAddress'));
              $this->assertNotEquals('foo@example.com', $message->getTo(), 'The message was not sent to the correct Email address');
              $this->assertEquals('Sample test with API'.time(), $message->getSubject(), 'The message was not sent with the correct subject');
              $this->assertEquals($response, $message->getBody(), 'The response does not matches');
          });
      }
      $this->assertContains('Mail Sent Successfully');

      }*/
}
