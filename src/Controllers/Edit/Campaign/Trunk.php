<?php

namespace WombatDialer\Controllers\Edit\Campaign;

use WombatDialer\Controllers\Edit\WombatMovable;

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
        $trunk = new \WombatDialer\Controllers\Edit\Trunk;
        $response = $trunk->update($data);

        return $response;
    }
}
