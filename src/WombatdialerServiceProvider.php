<?php

namespace WombatDialer;
use Illuminate\Support\ServiceProvider;

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