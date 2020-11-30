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
        if (file_exists('.env')) {
            $this->warn('.env file already exists!');
            exit;
        }

        $this->envContent = file_get_contents('.env.example');
        $variables = [
            'DB_HOST' => $this->setupEnvironmentVariable('host', 'DB_HOST'),
            'DB_PORT' => $this->setupEnvironmentVariable('port', 'DB_PORT'),
            'DB_DATABASE' => $this->setupEnvironmentVariable('database', 'DB_DATABASE'),
            'DB_USERNAME' => $this->setupEnvironmentVariable('username', 'DB_USERNAME'),
            'DB_PASSWORD' => $this->setupEnvironmentVariable('password', 'DB_PASSWORD')
        ];

        $printing =
            "Setting Enviroment Variables:\n";

        foreach ($variables as $environmentName => $value) {
            if ($value === '') {
                continue;
            }

            $printing .= $environmentName . '=' . $value . "\n";
        }

        $this->info($printing);

        file_put_contents('.env', $this->envContent);

        return 0;
    }

    private function setupEnvironmentVariable($optionName, $environmentName)
    {
        $setTo = $this->option($optionName);

        if ($setTo === null) {
            $setTo = $this->ask('Please enter a value for \'' . $optionName . '\'', '');
        }

        if ($setTo !== '') {
            $this->envContent = preg_replace('/' . $environmentName . '=.*(\\n|$)/', $environmentName . '=' . $setTo . "\n", $this->envContent);
        }

        return $setTo;
    }
}