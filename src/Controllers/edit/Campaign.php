<?php

namespace WombatDialer\Controllers\Edit;
use WombatDialer\Controllers\Edit\Wombat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Campaign extends Wombat
{
   //protected $path = '/edit/asterisk';
   use \WombatDialer\Concerns\CampaignTraits;
   
    /**
     * Perform API POST.
     * Deletes  the record based on the primary key for the API record.
     *
     * @param  string  $id
     * @return array
     */
    public function destroy($id)
    {
        $this->query = ['mode' => 'D'];
        $myData = [$this->primaryKeyname => $id];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection() , ['data' => json_encode($myData) ]);
        return false; // Campaign API Record cannot be removed using WombatDialler

    }

    /**
     * Set 'DaysOfWeek(Dow)' array  to a string using implode().
     *
     * @return string
     */
    public function setDow($data)
    {

        $data[$this->dow] = array_map(function ($val)
        {
            return $val + 1;

        }
        , $data[$this->dow]);
        $data[$this->dow] = implode($data[$this->dow]);
        return $data;
    }

    /**
     * Get 'DaysOfWeek(Dow)' from a string to an array.
     *
     * @return array
     */
    public function getDow($data)
    {
        array_walk_recursive($data, function (&$item, $key)
        {
            if ($key == $this->dow)
            {
                $item = str_split($item);
                $item = array_map(function ($val)
                {
                    return $val - 1;

                }, $item);

            }
        });
        return $data;

    }

    /**
     * Used to display the records with $tems and $from with 'DOW' as an array returned by getDow().
     *
     * @returns a Json response
     */
    public function index($items = null, $from = null)
    {

        $response = parent::index($items, $from);
        return $this->getDow($response);

    }

    /**
     * Used to display the  single record  with 'DOW' as an array returned by getDow().
     *
     * @returns an array
     */
    public function show($id)
    {

        $response = parent::show($id);
        return $this->getDow($response);

    }

}