<?php

namespace Bubbaops\Matrix\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;


class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'matrix:install';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clones the Laradock repository, publishes configurations, and sets up the .devcontainer.';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'matrix:install';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        /**  --------------  Devcontainer Configuration ------------------------ */
        Storage::disk('devcontainer')->put(
            'devcontainer.json',
            json_encode(Config::get('matrix.devcontainer'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        /** -------------  Re-Configure the  docker compose file ----------------*/
        Storage::disk('devcontainer')->put(
            'docker-compose.yml',
            yaml_emit(Config::get('matrix.docker-compose'))
        );
    }
}
