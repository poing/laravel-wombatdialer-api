<?php

namespace WombatDialer\Controllers\edit\Reports;
use WombatDialer\Controllers\edit\Wombat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Runs extends Wombat
{
   //protected $path = '/edit/asterisk';
   use \WombatDialer\Concerns\LiveCallsandReportsTraits;
   
     /**
     * Perform API GET.
     * Returns the list of  call runs made in the specific period ($from and $to).
     *
     * @params  $from and $to
     * @return json response
     */
    public function reportRuns($from, $to)
    {
        $this->path = '/reports/runs/';
        $from = $from ? $from : null;
        $to = $to ? $to : null;
        $this->query = ['from' => $from, 'to' => $to];

        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        return $response->json();

    }

}