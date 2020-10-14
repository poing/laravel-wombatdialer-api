<?php

namespace WombatDialer\Commands;

use Illuminate\Console\Command;

class WombatDialerInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wombatdialer:config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install WombatDialer Configuration File';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('Publishing WombatDialer Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'wombatdialer-config']);  // tag set in publishes()
        $this->info('WombatDialer installed successfully.');
    }
}
