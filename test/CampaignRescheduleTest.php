<?php


namespace WombatDialer\Test;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Support\Facades\Http;

class CampaignRescheduleTest extends UnitAbstract
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function testDisposition()
      {
      // test create dispositiom
      $rules = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
      $data = [
       'rescheduleRuleId' => null,
       'status' => 'RS_NOANSWER',
       'statusExt' => '',
       'maxAttempts' => 1,
       'retryAfterS' => 120,
       'mode' => 'FIXED',
     ];
      $addRules = $rules->addRules(1, $data);
      $reschId = $addRules['results'][0]['rescheduleRuleId'];
      $this->assertIsArray($addRules, 'The response is not an array'); 
      
     // test indexRules()
        $resch = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
        $index = $resch->indexRules(1);
        $this->assertIsArray($index, 'The response is not an array');
        $this->assertArrayHasKey('status', $index, 'The Key is not present in the given array');
        
      //test updaterules()
        $resch = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
         $data = [
        'rescheduleRuleId' => $reschId,
       'status' => 'RS_NOANSWER',
       'statusExt' => '',
       'maxAttempts' => 1,
       'retryAfterS' => 120,
       'mode' => 'FIXED',
     ];
        $data['status'] = 'SCHEDULED';
        $update = $resch->updateRules(1, $data);
        $this->assertIsArray($update, 'The response is not an array');
        $this->assertContains('SCHEDULED', $update['results'][1] , 'The Value does not exists in the record');
        
     //test deleterules()
      $resch = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
      $data = [
        'rescheduleRuleId' => $reschId,
     ];
      $destroy = $resch->destroyRules(1, $data);
      $this->assertIsArray($destroy, 'The response is not an array');
      $this->assertFalse(false);
      
      // test moveUp()
      $resch = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
     $data = [
        'rescheduleRuleId' => $reschId,
     ];
      $up = $resch->moveUp(1, $data);
      $this->assertIsArray($up, 'The response is not an array');
      $this->assertTrue(true);
      
      //test moveDown()
        $resch = new \WombatDialer\Controllers\Edit\Campaign\Reschedule;
     $data = [
        'rescheduleRuleId' => $reschId,
     ];
      $down = $resch->moveDown(1, $data);
      $this->assertIsArray($down, 'The response is not an array');
      $this->assertTrue(true);
    
        
 }
 
}

