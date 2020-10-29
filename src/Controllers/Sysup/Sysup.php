<?php

namespace WombatDialer\Controllers\Sysup;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class Sysup extends Wombat
{
    protected $path = '/sysup/';

    /**
     * Perform API GET.
     * Used to provide general information about the  WombatDialer system.
     *
     * @return response (JSON).
     */
    public function indexSysup()
    {
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());
        return $response->json();
    }

}
