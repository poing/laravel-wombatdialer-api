<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;

class LiveRunsTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function testLiveRuns()
      {
     
       //test LiveCalls()
        $runs = new \WombatDialer\Controllers\Live\Runs;
       
        $show = $runs->liveRuns();
        $this->assertTrue(true);
        $this->assertIsArray($show, 'The result is not an array');
        $this->assertContains('COMPLETED', $show['result']['campaigns'][0], 'The array does not contain the key');
        
       // test ShowLiveRUNS 
        $live = new \WombatDialer\Controllers\Live\Runs;
       
        $show = $live->showliveRuns();
        $this->assertTrue(true);
        $this->assertIsArray($show, 'The result is not an array');
        $this->assertContains('COMPLETED', $show['result']['campaigns'][0], 'The array does not contain the key');
        
        
 }
 
}

