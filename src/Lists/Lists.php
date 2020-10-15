<?php

namespace WombatDialer\Lists;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class Lists extends Wombat
{
    protected $path = '/lists/';

    /**
     * Perform API POST.
     * Updates the List API with the number and the email, id, name attributes from the DB table($tableData).
     *
     * @param array $number holds all the data from the table and the numbers(value) were separated by | .
     * @returns  string of numbers
     */
    public function addToList($tableData)
    {
        $numbers = [];

        foreach ($tableData as $item) {
            $numbers[] = $item->value.',id:'.$item->id.',email:'.$item->email.',name:'.$item->name;
        }

        $numbers = implode('|', $numbers);

        $this->query = ['op' => 'addToList', 'list' => 'TestList', 'numbers' => $numbers];
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->asForm()
            ->post($this->connection());

        return $response->body();
    }
}
