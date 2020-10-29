<?php

namespace WombatDialer\Controllers;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class Runs extends Wombat
{
    protected $path = '/runs/export.jsp';
    protected $trailingslash = false;

    /**
     * Perform API GET.
     * Used to get the runs information based on th runId.
     *
     * @param  'runId', 'mode' and 'cbr'.
     * @return response
     */
    public function runsInfo($array)
    {
        //$array = [1, 3,4];
        $runId = implode(',', $array);
        $this->query = ['runId' => $runId, 'mode' => 'csv', 'cbr'=> '455'];
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());

        return $response->body();
    }
}
