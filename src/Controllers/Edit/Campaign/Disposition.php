<?php

namespace WombatDialer\Controllers\Edit\Campaign;

use Illuminate\Support\Facades\Http;

class Disposition extends Reschedule
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
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->asForm()
            ->post($this->connection(), ['data' => json_encode($data)]);
        $this->checkDispData($data);
        //check response and send mail if errors
        $this->html_mail($response);

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
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->asForm()
            ->post($this->connection(), ['data' => json_encode($data)]);
        $this->checkDispData($data);
        //check response and send mail if errors
        $this->html_mail($response);

        // $record = collect($results['results'])->first()[$this->primaryKeyname];
        return $response->json();
    }

    /**
     * To check, Whether the 'onState' data matches with  the  data in the GUI.
     *
     * Returns a string, If the data does not matches.
     */
    public function checkDispData($data)
    {
        if ((! in_array($data['onState'], $this->statusOptions())) || (! in_array($data['verb'], $this->actionsOptions()))) {
            trigger_error('Value not found in option array!');
        }
    }

    /**
     * Generates a  Formatted HTML_MAIL.
     * @param $response fails, It generates a html_mail.
     *
     * @return string
     */
    public function html_mail($response)
    {
        $response = parent::html_mail($response);

        return 'mail Sent successfully!';
    }
}
