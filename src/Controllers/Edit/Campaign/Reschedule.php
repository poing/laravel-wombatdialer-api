<?php

namespace WombatDialer\Controllers\Edit\Campaign;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\WombatMovable;

class Reschedule extends WombatMovable
{
    protected $path = '/edit/campaign/reschedule/';
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
        if (! in_array($data['status'], $this->statusOptions())) {
            trigger_error('Value not found in option array!');
        }
        //check response and &send mail if error
        $this->html_mail($response);

        return $response->json();
    }

    /**
     * Perform API GET.
     * Displays all the records based on the @param $campaignId.
     *
     * @param  $campaignId
     * @return Json
     */
    public function indexRules($campaignId)
    {
        $this->query = ['parent' => $campaignId];
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->get($this->connection());
        //check response and &send mail if error
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
        if (! in_array($data['status'], $this->statusOptions())) {
            trigger_error('Value not found in option array!');
        }
        //check response and &send mail if error
        $this->html_mail($response);
        // $record = collect($results['results'])->first()[$this->primaryKeyname];
        return $response->json();
    }

    /**
     * Perform API POST.
     * Deletes the record  based on the @param $campaignId and the primaryKey (reschedulerulesId).
     *
     * @param  $campaignId and  array  $data
     * @return array
     */
    public function destroyRules($campaignId, $data)
    {
        $this->query = ['mode' => 'D', 'parent' => $campaignId];

        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->asForm()
            ->post($this->connection(), ['data' => json_encode($data)]);
        //check response and &send mail if error
        $this->html_mail($response);

        return $response->json();
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
