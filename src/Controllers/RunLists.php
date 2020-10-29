<?php

namespace WombatDialer\Controllers;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class RunLists extends Wombat
{
    protected $path = '/runlists/';

    /**
     * Perform API GET.
     * Used to perform operations like 'start/add', pause and unpause the list isn the campaign.
     *
     * @param $op and $campaign and List to add.
     * @return response
     */
    public function listOperations($op, $campaign, $list)
    {
        $op = $op ? $op : null;
        $campaign = $campaign ? $campaign : null;
        $list = $list ? $list : null;
        $this->query = ['op' => $op, 'campaign' => $campaign, 'list' => $list];
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());

        return $response->body();
    }

    /**
     * Perform API GET.
     * Used to show the lists on a running campaign.
     *
     * @param $op and $campaign
     * @return response
     */
    public function showLists($op, $campaign)
    {
        $op = $op ? $op : null;
        $campaign = $campaign ? $campaign : null;
        $this->query = ['op' => $op, 'campaign' => $campaign];
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());

        return $response->body();
    }
}
