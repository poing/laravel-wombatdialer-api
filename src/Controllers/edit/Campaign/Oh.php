<?php
namespace WombatDialer\Controllers\Edit\Campaign;

use WombatDialer\Controllers\Edit\WombatMovable;


class Oh extends WombatMovable
{

    protected $path = '/edit/campaign/oh/';

    /**
     * Perform API POST.
     * Updates the existing  Record for the EP API.
     *
     * @param   array  $data
     * @return array
     */
    public function update($data)
    {
        $oh = new \WombatDialer\Controllers\Edit\Oh;
        $response = $oh->update($data);
        return $response;

    }

}

