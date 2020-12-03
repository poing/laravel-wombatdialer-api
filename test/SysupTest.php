<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;

class SysupTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function testSysup()
      {
     
       //test Sysup()
        $syup = new \WombatDialer\Controllers\Sysup\Sysup;
       
        $show = $syup->indexSysup();
        $this->assertIsArray($show, 'The result is not an array');
        $this->assertArrayHasKey('version', $show, 'The key is not present in the array');
  
        
 }
 
}

