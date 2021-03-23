<?php
namespace WombatDialer\Controllers;

use Illuminate\Support\Facades\Http;
use WombatDialer\Controllers\Edit\Wombat;

class Lists extends Wombat
{
    protected $path = '/lists/';

    /**
     * Used to format TableData.
     *
     * @param $samples is the Data and $valueField is the column.
     * @returns array
     */
    public function formatTableData($samples, $valueField)
    {
        $chunk_size = config('wombatdialer.chunk_size');
        $samples::chunk($chunk_size, function ($records)
        {
            $numbers = [];
            //$valueField = 'value';
            foreach ($records as $item)
            {
                $numbers[] = $item->$valueField . ',id:' . $item->id;
            }
        });
        return $numbers;
    }

    /**
     * Used to convert the array to a string using implode.
     *
     * @param  $numbers is the data and value in the data should be separated by '|'.
     * @returns String.
     */
    public function myImplode($numbers)
    {
        return implode('|', $numbers);
    }

    /**
     * Perform API POST.
     * Updates the List API with the newly creates ListName and the Numbers.
     *
     * @param array $number holds all the data from the table and $list the ListName which is created from tableToList()
     * @returns  the response of 'List: ListName added numbers'.
     */
    public function addToList($list, $numbers)
    {
        $this->query = ['op' => 'addToList', 'list' => $list, 'numbers' => $numbers];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection());

        return $response;
    }
}

