<?php

namespace WombatDialer\Controllers;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class CallInfo extends Wombat
{
    protected $path = '/callinfo/';

    /**
     * Perform API GET.
     * Used to get the details of the currently live or scheduled call.
     *
     * @param  $id
     * @return response
     */
    public function callInfo($id)
    {
        $id = $id ?: null;
        $this->query = ['id' => $id];
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());

        return $response->json();
    }
}
