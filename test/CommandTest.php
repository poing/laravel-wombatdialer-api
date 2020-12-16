<?php

namespace WombatDialer\Test;

class CommandTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCommand()
    {
        $this->artisan('wombatdialer:config')
            ->expectsOutput('WombatDialer installed successfully.')
            ->assertExitCode(0);
    }
}
