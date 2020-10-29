<?php

namespace WombatDialer\Controllers;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class RecallInfo extends Wombat
{
    protected $path = '/recallinfo/';

    /**
     * Perform API GET.
     * Used to recall the state of call like 'reschedules, 'reschedulingSoon' and 'reschedulingLater'.
     *
     * @return response 
     */
   public function recall()
    {
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());

        return $response->json();
    }
    
}
