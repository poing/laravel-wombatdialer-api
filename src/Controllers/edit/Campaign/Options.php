<?php
namespace WombatDialer\Controllers\edit\Campaign;

use WombatDialer\Controllers\edit\Wombat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class Options extends Wombat
{
    protected $path = '/campaigns/';

     /**
     * Perform API GET.
     * Used to perform operations like 'start', 'pause', 'unpause','reload' on the existing Campaign ID's.
     *
     * @param  $op and $campaign
     * @return response(Campaign Id is started/Paused/Unpaused/Reloaded)
     */
    public function options($op, $campaign)
    {
        $op = $op ? $op : null;
        $campaign = $campaign ? $campaign : null;
        $this->query = ['op' => $op, 'campaign' => $campaign];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        return $response->body();
    }

     /**
     * Perform API GET.
     * Used to Clone the newly created Campaign API with the existing Campaign API, It will clone only the Campaign definition.
     *
     * @param  $op and $campaign and $newcampaign
     * @return response(Campaign Id is cloned to newcampaign)
     */
    public function cloneCampaign($op, $campaign, $newcampaign)
    {
        $op = $op ? $op : null;
        $campaign = $campaign ? $campaign : null;
        $newcampaign = $newcampaign ? $newcampaign : null;
        $this->query = ['op' => $op, 'campaign' => $campaign, 'newcampaign' => $newcampaign];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        return $response->body();
    }

     /**
     * Perform API GET.
     * Used to add the existing List to the Campaign API(Cloned one).
     * It will not work on running campaigns as they will not pick-up the new configuration until restarted.
     *
     * @param  $op and $campaign and $newcampaign
     * @return response(ListAPI is added to campaign)
     */
    public function addList($op, $campaign, $list)
    {
        $op = $op ? $op : null;
        $campaign = $campaign ? $campaign : null;
        $list = $list ? $list : null;
        $this->query = ['op' => $op, 'campaign' => $campaign, 'list' => $list];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        return $response->body();
    }

     /**
     * Perform API GET.
     * Used to set boost factor on a running campaign.
     *
     * @param  $op and $campaign and $factor
     * @return response(Boosting set in Campaign: 100%n)
     */
    public function boostFactor($op, $campaign, $factor)
    {
        $op = $op ? $op : null;
        $campaign = $campaign ? $campaign : null;
        $factor = $factor ? $factor : null;
        $this->query = ['op' => $op, 'campaign' => $campaign, 'factor' => $factor];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        return $response->body();
    }

}

