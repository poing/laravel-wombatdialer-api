<?php

namespace WombatDialer\Controllers\edit\Reports;
use WombatDialer\Controllers\edit\Wombat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Logs extends Wombat
{
   //protected $path = '/edit/asterisk';
   use \WombatDialer\Concerns\LiveCallsandReportsTraits;
   
     /**
     * Perform API GET.
     * Returns the Log set for the set of runs.
     *
     * @params  $items and $from and $id
     * @return json response
     */
    public function reportLogs($from, $items, $id)
    {
        $this->path = '/reports/logs/';
        $from = $from ? $from : null;
        $items = $items ? $items : null;
        $id = $id ? $id : null;
        $this->query = ['from' => $from, 'items' => $items, 'id' => $id];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        return $response->json();
    }

}