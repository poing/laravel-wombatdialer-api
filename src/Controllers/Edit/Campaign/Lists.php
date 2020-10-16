<?php

namespace WombatDialer\Controllers\Edit\Campaign;

use WombatDialer\Controllers\Edit\WombatMovable;

class Lists extends WombatMovable
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
        $list = new \WombatDialer\Controllers\Edit\Lists;
        $response = $list->update($data);

        return $response;
    }
}
