<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;

class DialerTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function testDialer()
      {
     
       //test addKey()
        $dial = new \WombatDialer\Controllers\Dialer;
       
        $show = $dial->options('start');
        $this->assertTrue(true);
        $this->assertIsString($show, 'The response is not a string');
  
        
 }
 
}

