<?php
namespace WombatDialer\Controllers\edit\Campaign;

use WombatDialer\Controllers\edit\WombatMovable;



class Wombatlist extends WombatMovable
{

    protected $path = '/edit/campaign/list/';

    /**
     * Perform API POST.
     * Updates the existing  Record for the EP API.
     *
     * @param   array  $data
     * @return array
     */
    public function update($data)
    {
        $list = new \WombatDialer\Controllers\edit\Wombatlist;
        $response = $list->update($data);
        return $response;

    }

}

