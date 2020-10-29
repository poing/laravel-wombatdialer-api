<?php

namespace WombatDialer\Controllers;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class Addkey extends Wombat
{
    protected $path = '/addkey/';

    /**
     * Perform API GET.
     * Used to add a license key to a working WombatDIaler system.
     *
     * @param  $op and $key
     * @return response (all installed keys in the WombatSystem)
     */
    public function addKey($op, $key)
    {
        $op = $op ? $op : null;
        $key = $key ? $key : null;
        $this->query = ['op' => $op, 'key' => $key];
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());

        return $response->json();
    }

}
