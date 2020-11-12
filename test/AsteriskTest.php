<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;

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
       $this->assertFalse('http://localhost:8080/wombat/api'== $asterisk->connection(), 'WOMBAT_HOST environment variable not set');
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
      
      //testIndex and show
            //$id = 267;
            //$show = $asterisk->show($id);
            //$this->assertIsArray($show, 'The response is not an array');
            //$this->assertCount(15, $show, 'The  Number of records does not matches the given count');
      
 }
public  function testShow()
  {
    $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
    $id= 264;
    $response = $asterisk->show($id);
    $this->assertIsArray($response, 'The response is not an array');
    $this->assertCount(15, $response, 'The  Number of records does not matches the given count');
 }
/* public  function testIndex()
  {
    $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
    $response = $asterisk->index();
    $this->assertIsArray($response, 'The response is not an array');
    $this->assertArrayHasKey('status', $response, 'The Key is not present in the given array');
 }*/

/* public  function testUpdate()
  {
    $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
     $data = [
        'id' => 68,
        'description' => 'charlie6',
        'serverType' => 'ASTERISKAMI',
        'ipAddress' => '10.10.10.10',
        'login' => 'username',
        'password' => 'password',
        'port' => 5038,
        'unit_len' => 50,
        'msg_per_unit' => 5,
        'securityKey' => 'alpha',
        'state' => 'DOWN',
    ];
    $data['description'] = 'Ferry';
    $response = $asterisk->update($data);
    $this->assertIsArray($response, 'The response is not an array');
    $this->assertContains('Ferry', $data , 'The Value does not exists in the record');
 }
  public  function testDestroy()
  {
    $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
    $id= 135;
    $response = $asterisk->destroy($id);
    $this->assertIsArray($response, 'The response is not an array');
    $this->assertArrayNotHasKey('id', $response, 'The  Key is not present in the record');
 }*/
 
}

