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
        foreach ($samples as $item)
        {
            $numbers[] = $item->$valueField . ',id:' . $item->id;
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
     * Perform API POST.
     * Updates the List API with the newly created ListName and the Numbers.
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

    /**
     * Added chunk() to the List of data and chunk_size from the config file.
     *
     * @param $list is the ListName (Project name)
     * @param $table is the TableName
     * @param $column is the column name(Number, phone, num) from the table to be added to the List.
     * @returns  the response.
     */

    public function chunkData($list, $table, $column)
    {
        $chunk = config('wombatdialer.chunk_size');
        $table->chunk($chunk, function ($records) use ($list, $column)
        {
            $data = $this->formatTableData($records, $column);
            $output = $this->myImplode($data);
            $final = $this->addToList($list, $output);

        });
        return 'List has been successfully updated!';

    }
}

