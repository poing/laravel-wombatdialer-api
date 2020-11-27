<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;
use Session;

class AuthenticationTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function testAuth()
      {
     
       //test auth() with admin credentials.
        $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
        $data =  [
        'description' => 'Alpha_001',
        'serverType' => 'ASTERISKAMI',
        'ipAddress' => '10.10.10.10',
        'login' => 'username',
        'password' => 'password',
        'port' => 5038,
        'unit_len' => 50,
        'msg_per_unit' => 5,
        'securityKey' => 'alphaTest',
        'state' => 'DOWN',
    ];
    

       $create = $asterisk->create($data);
       $index = $asterisk->index();
       $this->assertCount(1, $index, 'The count does not matches with the records');
       
     // test auth() with session values
        session(['wbt_user' => 'alpha']);
        session(['wbt_pass' => 'alpha']);
        $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
         $data =  [
        'description' => 'Alpha_005',
        'serverType' => 'ASTERISKAMI',
        'ipAddress' => '10.10.10.10',
        'login' => 'username',
        'password' => 'password',
        'port' => 5038,
        'unit_len' => 50,
        'msg_per_unit' => 5,
        'securityKey' => 'alphaTest',
        'state' => 'DOWN',
    ];
       $create = $asterisk->create($data);
       $index = $asterisk->index();
       $this->assertCount(1, $index, 'The count does not matches with the records');
       
       
       // test auth() with construct('user', 'pass')
        
         $asterisk = new \WombatDialer\Controllers\Edit\Asterisk('bravo', 'bravo');
         $data =  [
        'description' => 'Alpha_006',
        'serverType' => 'ASTERISKAMI',
        'ipAddress' => '10.10.10.10',
        'login' => 'username',
        'password' => 'password',
        'port' => 5038,
        'unit_len' => 50,
        'msg_per_unit' => 5,
        'securityKey' => 'alphaTest',
        'state' => 'DOWN',
        ];
       $create = $asterisk->create($data);
       $index = $asterisk->index();
       $this->assertCount(1, $index, 'The count does not matches with the records');
       
       // test auth() again with admin
        Session::pull('wbt_user', 'alpha');
        Session::pull('wbt_pass', 'alpha');
        $asterisk = new \WombatDialer\Controllers\Edit\Asterisk;
        $index = $asterisk->index();
        $this->assertCount(3, $index, 'The count does not matches with the records');
       
    }
}
