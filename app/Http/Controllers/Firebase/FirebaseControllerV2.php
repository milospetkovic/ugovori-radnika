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

class FirebaseControllerV2 extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        //die('OK');
//        $notificationBuilder = new PayloadNotificationBuilder();
//        $notificationBuilder->setTitle('title')
//            ->setBody('body')
//            ->setSound('default');
//
//
//        $notification = $notificationBuilder->build();
//        die('zavrseno');

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('My_Title');
        $notificationBuilder->setTitle('Ovo je title za app');
        $notificationBuilder->setBody('Body za app..');
        $notificationBuilder->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = "djvw4Lz9_5A:APA91bEwdc7belP8iclp8Bop_hLiM0ZbRfFKBIVtSjETV9M5hoV5O8Lc_l6rKnaZlLnYto8vrNG2WyiXS6eMeiUEJenCnw2wElG2Bppsodnjh6sX20Q2PXF7qB64tESmS4_isqV8p16E";

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

}