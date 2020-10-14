<?php

namespace WombatDialer\Controllers\Edit;

use Illuminate\Support\Facades\Http;

class DialerOptions extends Wombat
{
    protected $path = '/dialer/';

    /**
     * Perform API GET.
     * Used to perform operations like 'state', 'start' and 'stop' on the dialer.
     *
     * @param  $op
     * @return response
     */
    public function options($op)
    {
        $op = $op ? $op : null;
        $this->query = ['op' => $op];
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());

        return $response->body();
    }
}
