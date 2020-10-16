<?php

namespace WombatDialer\Controllers\Reports;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

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
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());

        return $response->json();
    }
}
