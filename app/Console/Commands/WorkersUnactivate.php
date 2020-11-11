<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Model\Services\UnactivateWorkersService;


class WorkersUnactivate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'workers:unactivate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute workers:unactivate from artisan console or via cronjob to unactivate workers which are active and which active_until_date is in the past';

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
        $unWorkersService = new UnactivateWorkersService();

        $result = $unWorkersService->unactivateWorkersIfConditionIsFulfilled();

        print $result."\n";
    }
}
