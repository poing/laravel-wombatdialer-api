<?php

namespace WombatDialer\Concerns;

trait TrunkTraits
{
    protected $path = '/edit/trunk/';
    protected $primaryKeyname = 'trunkId';
    protected $default = [
        'astId' => [
            'id' => 4,
        ],
        'name' => 'Gamma',
        'dialstring' => 'Local/${num}@from-internal/n',
        'capacity'  =>  10,
        'securityKey' => '',
    ];
}
