<?php

namespace WombatDialer\Controllers;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class Reserve extends Wombat
{
    protected $path = '/reserve/';

    /**
     * Perform API GET.
     * Used to reserve the call.
     *
     * @param $op(reserve) and $id(WombatId).
     * @return response 
     */
   public function reservedCall($op, $id)
    {
        $op = $op ? $op : null;
        $id = $id ? $id : null;
        $this->query = ['op' => $op, 'id' => $id];
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());
        return $response->body();
    }
   
   
}
