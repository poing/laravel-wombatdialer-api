<?php

namespace WombatDialer\Controllers;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class Calls extends Wombat
{
    protected $path = '/calls/';

    /**
     * Perform API GET.
     * Used to add a call to a campaign that is either running or idling.
     *
     * @param  $op (addcall), $campaign, $number(number to add)
     * @return response 
     */
   public function calls($op, $campaign, $number)
    {
        $op = $op ? $op : null;
        $campaign = $campaign ? $campaign : null;
        $number = $number ? $number : null;
        $this->query = ['op' => $op, 'campaign' => $campaign, 'number' => $number];
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());

        return $response->body();
    }
    
}
