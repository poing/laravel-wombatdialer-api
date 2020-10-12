<?php
namespace WombatDialer\Controllers\edit;
use WombatDialer\Controllers\edit\Wombat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use WombatDialer\Models\Sample;

class NumberList extends Wombat
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

        foreach ($tableData as $item)
        {
            $numbers[] = $item->value . ',id:' . $item->id . ',email:' . $item->email . ',name:' . $item->name;
        }

        $numbers = implode('|', $numbers);

        $this->query = ['op' => 'addToList', 'list' => 'ListSample', 'numbers' => $numbers];
        $response = Http::withBasicAuth($this->userAuth() , $this->passAuth())
            ->asForm()
            ->post($this->connection());
        return $response->body();
    }

}

