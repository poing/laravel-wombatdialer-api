<?php
namespace WombatDialer\Controllers\Edit\Campaign;

use WombatDialer\Controllers\Edit\WombatMovable;



class Ep extends WombatMovable
{

    protected $path = '/edit/campaign/ep/';

    /**
     * Perform API POST.
     * Updates the existing  Record for the EP API.
     *
     * @param   array  $data
     * @return array
     */
    public function update($data)
    {
        $ep = new  \WombatDialer\Controllers\Edit\Ep;
        $response = $ep->update($data);
        return $response;

    }

}

