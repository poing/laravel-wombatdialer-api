<?php

namespace WombatDialer;

use Illuminate\Support\ServiceProvider;
use WombatDialer\Commands\WombatDialerInstall;

class WombatdialerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Publish Configuration Files
        $this->publishes([
            __DIR__.'/configuration/wombatdialer.php' => config_path('wombatdialer.php'),
        ], 'wombatdialer-config');
       // dd(config_path());
        // Load Commands
        if ($this->app->runningInConsole() && ! file_exists(config_path('wombatdialer.php'))) {
            $this->commands([
                WombatDialerInstall::class,
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Default Package Configuration
        $this->mergeConfigFrom(__DIR__.'/configuration/wombatdialer.php', 'wombatdialer');
        $this->mergeConfigFrom(__DIR__.'/configuration/default.php', 'wombatdialer');
    }
}
