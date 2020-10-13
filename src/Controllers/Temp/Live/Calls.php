<?php

namespace WombatDialer\Controllers\Edit\Live;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Calls extends Wombat
{
   //protected $path = '/edit/asterisk';
   use \WombatDialer\Concerns\LiveCallsandReportsTraits;
   
    /**
     * Perform API GET.
     * Returns the list of all the Live calls.
     *
     * @return json response
     */
    public function liveCalls()
    {
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        return $response->json();

    }

    /**
     * Perform API GET.
     * Returns the list of all the Live calls.
     *
     * @return json response
     */
    public function showliveCalls()
    {
        return $this->liveCalls();

    }

}