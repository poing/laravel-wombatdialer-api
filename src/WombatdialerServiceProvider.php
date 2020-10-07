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
            __DIR__ . '/config/wombatdialer.php' => config_path('wombatdialer.php'),
        ], 'wombatdialer-config');
        // Load Commands
        if ($this->app->runningInConsole() && !file_exists(config_path('wombatdialer.php'))) {
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
        $this->mergeConfigFrom(__DIR__ . '/config/wombatdialer.php', 'wombatdialer');
        $this->mergeConfigFrom(__DIR__ . '/config/default.php', 'wombatdialer');
    }
}