<?php

namespace WombatDialer\Controllers;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class InspectDialer extends Wombat
{
    protected $path = '/inspect_dialer/';

    /**
     * Perform API GET.
     * Used to inspect the dialer with list of operations like 'Campaign_runs', 'Live calls', 'Trunks','EndPoints' etc..
     *
     * @param  $op.
     * @return response.
     */
    public function inspectDialer($op)
    {
        $op = $op ? $op : null;
        $this->query = ['op' => $op];
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());

        return $response->json();
    }

}
