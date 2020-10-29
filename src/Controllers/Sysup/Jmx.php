<?php

namespace WombatDialer\Controllers\Sysup;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class Jmx extends Wombat
{
    protected $path = '/sysup/jmx/';

    /**
     * Perform API GET.
     * Used to provide general  runtime information about the  WombatDialer system.
     *
     * @return response (JSON).
     */
    public function indexJmx()
    {
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());

        return $response->json();
    }
}
