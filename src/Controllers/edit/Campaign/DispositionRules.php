<?php
namespace WombatDialer\Controllers\edit\Campaign;

use \WombatDialer\Controllers\edit\Campaign\RescheduleRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DispositionRules extends RescheduleRules
{

    protected $path = '/edit/campaign/disposition/';
    use \WombatDialer\Concerns\RulesTraits;

   /**
     * Perform API POST.
     * Creates a new  Rules for the API.
     *
     * @param  $campaignId and  array  $data
     * @return array
     */
    public function addRules($campaignId, $data)
    {
        $this->query = ['mode' => 'E', 'parent' => $campaignId]; // E for Edit
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection() , ['data' => json_encode($data) ]);
        if ((!in_array($data['onState'], $this->statusOptions())) || (!in_array($data['verb'], $this->actionsOptions())))
        {
            trigger_error('Value not found in option array!');
        }

        return $response->json();

    }

     /**
     * Perform API POST.
     * Updates the existing  Rules for the API.
     *
     * @param  $campaignId and  array  $data
     * @return array
     */
    public function updateRules($campaignId, $data)
    {
        $this->query = ['mode' => 'E', 'parent' => $campaignId]; // E for Edit
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection() , ['data' => json_encode($data) ]);
        if ((!in_array($data['onState'], $this->statusOptions())) || (!in_array($data['verb'], $this->actionsOptions())))
        {
            trigger_error('Value not found in option array!');
        }
        // $record = collect($results['results'])->first()[$this->primaryKeyname];
        return $response->json();

    }


}

