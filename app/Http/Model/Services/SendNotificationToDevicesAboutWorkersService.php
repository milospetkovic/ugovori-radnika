<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 9.2.19.
 * Time: 17.20
 */

namespace App\Http\Model\Services;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

use App\Http\Model\Managers\CompanyManager;
use App\Http\Model\Managers\WorkerManager;
use App\Http\Model\Managers\AndroidTokenManager;

class SendNotificationToDevicesAboutWorkersService
{
    private $companyManager;
    private $workerManager;
    private $androidTokenManager;

    /**
     * Return message after sending notification
     *
     * @var
     */
    public $returnMessage='';

    public function __construct()
    {
        $this->companyManager = new CompanyManager();
        $this->workerManager = new WorkerManager();
        $this->androidTokenManager = new AndroidTokenManager();
    }

    public function sendNotificationToAndroidDevices()
    {
        $cntWorkers = $this->workerManager->countWorkersWhichContractRunOut();

        if ($cntWorkers) {

            $this->returnMessage = 'Imate ukupno '.$cntWorkers.' radnika kojima istice ugovor.';

            $androidTokens = $this->androidTokenManager->getAllTokens();

            if (is_array($androidTokens) && count($androidTokens)) {

                foreach ($androidTokens as $androidToken) {

                    $optionBuilder = new OptionsBuilder();

                    // time to live message in the FCM (in seconds)
                    $optionBuilder->setTimeToLive(60 * 60 * 12);

                    $notificationBuilder = new PayloadNotificationBuilder('Ferdil pracenje radnika');
                    $notificationBuilder->setTitle('Isticanje ugovora');
                    $notificationBuilder->setBody('Imate ukupno '.$cntWorkers.' radnika kojima istice ugovor');
                    $notificationBuilder->setSound('default');

                    $dataBuilder = new PayloadDataBuilder();
                    $dataBuilder->addData(['a_data' => 'my_data']);

                    $option = $optionBuilder->build();
                    $notification = $notificationBuilder->build();
                    $data = $dataBuilder->build();

                    $token = $androidToken->token;

                    $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

                    $downstreamResponse->numberSuccess();
                    $downstreamResponse->numberFailure();
                    $downstreamResponse->numberModification();

                    //return Array - you must remove all this tokens in your database
                    $downstreamResponse->tokensToDelete();

                    //return Array (key : oldToken, value : new token - you must change the token in your database )
                    $downstreamResponse->tokensToModify();

                    //return Array - you should try to resend the message to the tokens in the array
                    $downstreamResponse->tokensToRetry();
                }

                $this->returnMessage.= ' Notifikacije su poslate na ukupno '.count($androidTokens).' android uredjaja koji su registrovani u bazi.';
            } else {
                $this->returnMessage.= ' Notifikacije nisu poslate zato sto nemate nijedan uredjaj sa token-om registrovanog u bazi.';
            }
        } else {
            $this->returnMessage = 'Nemate radnike kojima istice ugovor. Notifikacije nisu poslate!';
        }

        return $this->returnMessage;
    }

}