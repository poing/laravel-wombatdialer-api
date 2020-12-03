<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;

class ReserveTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function testReserve()
      {
     
       //test reserve a Call()
        $res = new \WombatDialer\Controllers\Reserve;
       
        $show = $res->reservedCall('dial', '344555');
        $this->assertTrue(true);
        $this->assertIsString($show, 'The response is not a string');
        
 }
 
}

