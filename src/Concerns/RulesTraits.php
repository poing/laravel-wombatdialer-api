<?php

namespace WombatDialer\Concerns;

trait RulesTraits
{
    public function statusOptions()
    {
        return ['UNKNOWN', 'IN_HOPPER', 'SCHEDULED', 'RD_SCHEDULED', 'REQUESTED', 'DIALLING', 'CONNECTED', 'TERMINATED', 'AGENT', 'RESERVED', 'RS_BLACKLIST', 'RS_ERROR', 'RS_NOANSWER', 'RS_BUSY', 'RS_NUMBER', 'RS_REJECTED', 'RS_NO_AGENT', 'RS_AGENT_SKIP', 'RS_TIMEOUT', 'RS_AGENT', 'RS_LOST'];
    }

    public function actionsOptions()
    {
        return ['NONE', 'HTTP Get', 'HTTP Post', 'ADD_LIST', 'Add to blacklist', 'Send e-mail', 'Reschedule'];
    }
}
