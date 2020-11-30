<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupDevEnvironment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup {--H|host=} {--P|port=} {--D|database=} {--U|username=} {--W|password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Quickly setup a valid development environment';

    protected $help = "Does the following steps:\n"
        . "\t1. Generate environment file";

    private $envContent = '';

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
     * @return int
     */
    public function handle()
    {
        $globalProgress = $this->output->createProgressBar(2);

        $globalProgress->display();
        $this->info(' STEP: setup .env file');

        if (file_exists('.env')) {
            $this->info('.env file already exists, skipping step.');
            $this->envContent = file_get_contents('.env');
        } else {

            $this->envContent = file_get_contents('.env.example');
            $variables = [
                'DB_HOST' =>        $this->setupEnvironmentVariable('host',         'DB_HOST',      '127.0.0.1'),
                'DB_PORT' =>        $this->setupEnvironmentVariable('port',         'DB_PORT',      '3306'),
                'DB_DATABASE' =>    $this->setupEnvironmentVariable('database',     'DB_DATABASE',  'laravel'),
                'DB_USERNAME' =>    $this->setupEnvironmentVariable('username',     'DB_USERNAME',  'root'),
                'DB_PASSWORD' =>    $this->setupEnvironmentVariable('password',     'DB_PASSWORD',  '')
            ];

            $printing =
                "Setting Enviroment Variables:\n";

            foreach ($variables as $environmentName => $value) {
                if ($value === '') {
                    continue;
                }

                $printing .= "\t" . $environmentName . '=' . $value . "\n";
            }

            $this->info($printing);

            file_put_contents('.env', $this->envContent);
        }
        $globalProgress->advance();

        $globalProgress->display();
        $this->info(' STEP: generate application key');

        if (preg_match('/APP_KEY=[a-zA-Z0-9\:\=]/', $this->envContent) === 1) {
            $this->info('App key found, skipping step');
        } else {
            $this->call('key:generate');
        }


        $globalProgress->advance();
        $this->newLine();


        return 0;
    }

    private function setupEnvironmentVariable($optionName, $environmentName, $default = '')
    {
        $setTo = $this->option($optionName);

        if ($setTo === null) {
            $setTo = $this->ask('Please enter a value for \'' . $optionName . '\'', $default);
        }

        if ($setTo !== '') {
            $this->envContent = preg_replace('/' . $environmentName . '=.*(\\n|$)/', $environmentName . '=' . $setTo . "\n", $this->envContent);
        }

        return $setTo;
    }
}
