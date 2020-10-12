<?php
namespace WombatDialer\Controllers\edit\Campaign;

use WombatDialer\Controllers\edit\WombatMovable;


class Trunk extends WombatMovable
{

    protected $path = '/edit/campaign/trunk/';

    /**
     * Perform API POST.
     * Updates the existing  Record for the EP API.
     *
     * @param   array  $data
     * @return array
     */
    public function update($data)
    {
        $trunk = new \WombatDialer\Controllers\edit\Trunk;
        $response = $trunk->update($data);
        return $response;

    }

}

