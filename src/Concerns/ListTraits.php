<?php

namespace WombatDialer\Concerns;

trait ListTraits
{
    protected $path = '/edit/list/';
    protected $primaryKeyname = 'listId';
    protected $default = [
        'name' => 'Mock',
        'isHidden' => false,
        'securityKey' => '',
    ];
}
