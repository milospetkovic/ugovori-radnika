<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Model\Services\SendNotificationToDevicesAboutWorkersService;

class FirebaseSendnotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'firebase:sendnotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute firebase:sendnotifications from artisan console or via cronjob to send notification to the firebase and android devices';

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
        $fbService = new SendNotificationToDevicesAboutWorkersService();

        $result = $fbService->sendNotificationToAndroidDevices();

        print $result."\n";
    }
}
