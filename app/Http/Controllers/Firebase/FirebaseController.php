<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 27.1.19.
 * Time: 23.10
 */

namespace App\Http\Controllers\Firebase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Managers\CompanyManager;
use App\Helpers\EventMessages;
use App\Http\Model\Managers\WorkerManager;
use Kreait\Firebase\Configuration;
use Kreait\Firebase\Firebase;


class FirebaseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = new Configuration();
        $config->setAuthConfigFile(realpath(base_path('/resources/json/google-services.json')));

        //$firebase = new Firebase('https://ferdil-pracenje-radnika.firebaseio.com', $config);

        $firebase = new Firebase('https://fcm.googleapis.com/fcm/send', $config);

        $firebase->set(['this_is_key' => 'this_is_value'], 'my/data');

        print_r($firebase->get('my/data'));

        //$firebase->delete('my/data');
    }
}