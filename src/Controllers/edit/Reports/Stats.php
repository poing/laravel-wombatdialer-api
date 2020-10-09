<?php

namespace WombatDialer\Controllers\edit\Reports;
use WombatDialer\Controllers\edit\Wombat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Stats extends Wombat
{
   //protected $path = '/edit/asterisk';
   use \WombatDialer\Concerns\LiveCallsandReportsTraits;
   
      /**
     * Perform API GET.
     * Returns the call runs statistics for a single run , based on the parameter $id.
     *
     * @params $id
     * @return json response
     */
    public function reportStats($id = null)
    {
        $this->path = '/reports/stats/';
        $id = $id ? $id : null;
        $this->query = ['id' => $id];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        return $response->json();
    }

}