<?php

namespace WombatDialer\Test;

use Orchestra\Testbench\TestCase;

abstract class UnitAbstract extends TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->loadMigrationsFrom(env('TRAVIS_BUILD_DIR').'/test/database/migrations');
        $this->withFactories(env('TRAVIS_BUILD_DIR').'/test/database/factories');
        $this->artisan('migrate');
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        // Make sure php-sqlite3 is installed on the system.

        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * Get package providers.  At a minimum this is the package
     * being tested, but also would include packages upon which
     * our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the
     * 'providers' array in the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \WombatDialer\WombatdialerServiceProvider::class,
            //'Cartalyst\Sentry\SentryServiceProvider',
            //'YourProject\YourPackage\YourPackageServiceProvider',
        ];
    }
}
