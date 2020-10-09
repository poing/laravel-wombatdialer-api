<?php
namespace WombatDialer\Controllers\edit\Campaign;

use WombatDialer\Controllers\edit\WombatMovable;
use WombatDialer\Controllers\edit\Oh;


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
        $oh = new Oh;
        $response = $oh->update($data);
        return $response;

    }

}

