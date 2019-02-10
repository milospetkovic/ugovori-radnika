<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 31.1.19.
 * Time: 17.34
 */

namespace App\Http\Controllers\Firebase;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Managers\CompanyManager;
use App\Helpers\EventMessages;
use App\Http\Model\Managers\WorkerManager;


use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\Http\Model\Services\SendNotificationToDevicesAboutWorkersService;

class FirebaseBrozotController extends Controller
{

    private $sendMessageService;

    /**
     * FirebaseBrozotController constructor.
     */
    public function __construct()
    {
        // needed authentication for this controller
        $this->middleware('auth');

        $this->sendMessageService = new SendNotificationToDevicesAboutWorkersService();
    }

    public function sendNotifications()
    {
        $returnMesg = $this->sendMessageService->sendNotificationToAndroidDevices();

        if (strlen($returnMesg)) {
            flash($returnMesg, "warning");
        }

        return redirect()->action('HomeController@index');

    }

}