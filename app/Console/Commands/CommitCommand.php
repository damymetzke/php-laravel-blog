<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CommitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:commit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run tests and commit using git CLI.';

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
        $this->info(' STEP: Run tests.');

        $this->call('test');

        $globalProgress->advance();
        $globalProgress->display();
        $this->info(' STEP: call git commit');

        exec('git commit -v');

        $globalProgress->advance();
        $this->newLine();

        return 0;
    }
}
