<?php

namespace WombatDialer\Controllers\Edit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

abstract class WombatMovable extends Wombat
{

    /**
     * Perform API POST.
     * Creates a new record for the  API.
     *
     * @param  $campaignId and  array  $data
     * @return array
     */
    public function addRecord($campaignId, $data)
    {
        $this->query = ['mode' => 'E', 'parent' => $campaignId]; // E for Edit
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection() , ['data' => json_encode($data) ]);

        // $record = collect($results['results'])->first()[$this->primaryKeyname];
        return $response->json();

    }

     /**
     * Perform API GET.
     * Finds record based on the $campaignId for the API record.
     *
     * @param  $campaignId
     * @return array
     */
    public function showRecord($campaignId)
    {
        $response = self::indexRecord($campaignId);
        return $response;

    }

     /**
     * Perform API POST.
     * Deletes  the record based on the @param $campaignId and the $data(primary Keyname).
     *
     * @param  $campaignId and $data
     * @return array
     */
    public function destroyRecord($campaignId, $data)
    {
        $this->query = ['mode' => 'D', 'parent' => $campaignId];

        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection() , ['data' => json_encode($data) ]);
        return $response->json();
    }

     /**
     * Perform API GET.
     * Displays the record based on the $campaignId for the API record.
     *
     * @param   $campaignId
     * @return array
     */
    public function indexRecord($campaignId)
    {

        $this->query = ['parent' => $campaignId];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->get($this->connection());
        return $response->json();

    }

     /**
     * Perform API POST.
     * Moves the record UP based on the @param $campaignId and $data(PrimaryKey name).
     *
     * @param   $campaignId and $data
     * @return array
     */
    public function moveUp($campaignId, $data)
    {
        $this->query = ['mode' => 'MU', 'parent' => $campaignId];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection() , ['data' => json_encode($data) ]);
        return $response->json();

    }

     /**
     * Perform API POST.
     * Moves the record DOWN  based on the @param $campaignId and $data(PrimaryKey name).
     *
     * @param   $campaignId and $data
     * @return array
     */
    public function moveDown($campaignId, $data)
    {
        $this->query = ['mode' => 'MD', 'parent' => $campaignId];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection() , ['data' => json_encode($data) ]);
        return $response->json();

    }
}

