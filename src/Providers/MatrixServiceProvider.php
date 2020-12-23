<?php

namespace Bubbaops\Matrix\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Bubbaops\Matrix\Console\InstallCommand;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;

/**
 * Matrix Service Provider 
 * 
 * Service providers are the central place of all Laravel application bootstrapping. 
 * Your own application, as well as all of Laravel's core services are bootstrapped 
 * via service providers.
 * 
 * @package Bubbaops\Matrix\Providers
 */
class MatrixServiceProvider extends ServiceProvider
{
    /**
     * Default path to configuration.
     *
     * @var string
     */
    protected $configPath = __DIR__ . '/../../config/matrix.php';

    protected $dockerFilesPath = __DIR__ . '/../../dockerfiles/';
    /**
     * Path to publish the configuration to.
     *
     * @var string
     */
    protected $publishPath;

    /**
     * Register any application services.
     * 
     * Within the register method, you should only bind things into the service container. You
     * should never attempt to register any event listeners, routes, or any other piece of
     * functionality within the register method. Otherwise, you may accidentally use a 
     * service that is provided by a service provider which has not loaded yet.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom($this->configPath, 'matrix');
    }

    /**
     * Bootstrap any application services.
     *
     * This method is called after all other service providers have been registered, meaning 
     * you have access to all other services that have been registered by the framework.
     * 
     * @return void
     */
    public function boot(): void
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        Event::listen('*', function ($event) use ($out) {
            $out->write(
                sprintf(
                    "<info>[%s]</info>\n",
                    $event
                )
            );
        });

        Config::set('filesystems.disks.devcontainer',  [
            'driver' => 'local',
            'root' => Config::get('matrix.install_path'),
        ]);

        $this->publishPath = App::configPath('matrix.php');

        $this->publishes([$this->configPath => $this->publishPath], 'config');

        $this->publishes([$this->dockerFilesPath => Config::get('matrix.install_path')], 'devcontainer');

        if ($this->app->runningInConsole()) {
            $this->commands([InstallCommand::class,]);
        }

        // /**  --------------  Setup The Dev Container --------------------------- */
        // if (File::isDirectory(Config::get('matrix.install_path')) === false) {
        //     File::makeDirectory(Config::get('matrix.install_path'));
        // }
    }
}
