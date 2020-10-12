<?php
namespace WombatDialer\Controllers\edit\Campaign;

use WombatDialer\Controllers\edit\WombatMovable;


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
        $oh = new \WombatDialer\Controllers\edit\Oh;
        $response = $oh->update($data);
        return $response;

    }

}

