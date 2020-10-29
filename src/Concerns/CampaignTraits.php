<?php

namespace WombatDialer\Concerns;

trait CampaignTraits
{
    protected $path = '/edit/campaign/';
    protected $primaryKeyname = 'campaignId';
    protected $dow = 'timeDow';
    protected $default = [
        'name' => 'Gamma',
        'priority' => 10,
        'pace'=> 'RUNNABLE',
        'dial_timeout' => 30000,
        'dial_clid' => '',
        'dial_account' =>  '',
        'dial_pres' => '',
        'addlLogging' => 'QM_COMPATIBLE',
        'pauseWhenFinished' => 0,
        'timeStartHr' => '000000',
        'timeEndHr' => '235959',
        'timeDow' => '345',
        'maxCallLength' => 0,
        'batchSize' => 1,
        'httpNotify' => 'https://example.com',
        'loggingAlias' => '',
        'securityKey' => 'admin',
        'autopause' => false,
        'agentClid' => '',
        'emailAddresses' => '',
        'emailEvents' => 'NO',
        'initialBoostFactor' => 1,
        'initialPredictiveModel' =>  'OFF',
        'amdTracking' => 'OFF',
        'amdParams' => '',
        'amdAudioFile' => '',
        'amdFaxFile' => '',
        'campaignVars' => '',
        'loggingQmVars'=> '',
    ];
}
