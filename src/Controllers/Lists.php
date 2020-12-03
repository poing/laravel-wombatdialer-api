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
        $numbers = [];
        //$valueField = 'value';
        foreach ($samples as $item) {
            $numbers[] = $item->$valueField.',id:'.$item->id.',email:'.$item->email.',name:'.$item->name;
        }

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
     * Used to format the results returned from the Model Data.
     *
     * @param $array is theFor data and $column is the column to be formatted.
     * @returns String.
     */
    public function formatResults($array, $column)
    {
        $compact = $this->formatTableData($array, $column);
        $string = $this->myImplode($compact);

        return $string;
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
        $response = Http::withBasicAuth($this->userAuth(), $this->passAuth())
            ->asForm()
            ->post($this->connection());

        return $response->body();
    }

    /**
     * Used to update the List API.
     * If the data is larger , It is broken into chunks using chunk().
     *
     * @param $list : ListName , $model: Model data, $column: column which we need to format.
     * @returns String.
     */
    public function updateList($list, $model, $column)
    {
        $chunks = config('wombatdialer.chunk_size');
        $model->chunk($chunks, function ($records) use ($list, $column) {
            $data = $this->formatResults($records, $column);
            $someOutput = $this->addToList($list, $data);
            sleep(20);  
        });

        return 'List has been successfully updated!';
    }
}
