<?php
namespace WombatDialer\Controllers\edit\Campaign;

use WombatDialer\Controllers\edit\WombatMovable;



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
        $ep = new  \WombatDialer\Controllers\edit\Ep;
        $response = $ep->update($data);
        return $response;

    }

}

