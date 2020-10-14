<?php

namespace WombatDialer\Concerns;

trait OhTraits
{
    protected $path = '/edit/oh/';
    protected $primaryKeyname = 'openingHourId';
    protected $dow = 'onDow';
    protected $default = [
        'securityKey' => '',
        'name' => 'Newton',
        'defaultMode' => 'DEF_OPEN',
        'comment' => 'Newton Test for Dev',
        'hidden' => false,
    ];
}
