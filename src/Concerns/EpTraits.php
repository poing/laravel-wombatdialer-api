<?php

namespace WombatDialer\Concerns;

trait EpTraits
{
    protected $path = '/edit/ep/';
    protected $primaryKeyname = 'epId';
    protected $default = [
        'type' => 'PHONE',
        'queueName' => '',
        'name' => 'DefaultSample',
        'astId' => [
            'id' => 106,
        ],
        'idx' => '',
        'campaignId' => '',
        'maxChannels'  => 1,
        'extension' => '9999',
        'context' => 'default',
        'boostFactor' => 1,
        'maxWaitingCalls' => 2,
        'reverseDialing' => false,
        'stepwiseReverse' => false,
        'securityKey' => 'charlie',
        'description' => 'Sample',
        'dialFind' => '',
        'dialReplace' => '',
    ];
}
