<?php

namespace WombatDialer\Concerns;

trait AsteriskTraits
{
    protected $path = '/edit/asterisk/';
    protected $primaryKeyname = 'id';
    protected $default = [
        'description' => 'Pascal',
        'serverType' => 'ASTERISKAMI',
        'ipAddress' => '10.10.10.10',
        'login' => 'username',
        'password' => 'password',
        'port' => 5038,
        'unit_len' => 50,
        'msg_per_unit' => 5,
        'securityKey' => 'alpha',
        'state' => 'DOWN',
    ];
}
