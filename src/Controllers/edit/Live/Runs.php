<?php

namespace WombatDialer\Controllers\edit\Live;
use WombatDialer\Controllers\edit\Wombat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Runs extends Wombat
{
   //protected $path = '/edit/asterisk';
   use \WombatDialer\Concerns\LiveCallsandReportsTraits;
   
    /**
     * Perform API GET.
     * Returns the List of Live status of the Campaigns.
     *
     * @return json response
     */
    public function liveRuns()
    {
        $this->path = '/live/runs/';
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        return $response->json();

    }

     /**
     * Perform API GET.
     * Returns the List of Live status of the Campaigns.
     *
     * @return json response
     */
    public function showliveRuns()
    {
        return $this->liveRuns();

    }

}