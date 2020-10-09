<?php

namespace WombatDialer\Concerns;

trait WombatlistTraits
{
      protected $path = '/edit/list/';
      protected $primaryKeyname = 'listId';
      protected $default = [
        'name' => 'Mock',
        'isHidden' => false,
        'securityKey' => ''
      ];

}