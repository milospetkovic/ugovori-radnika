<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 6.2.19.
 * Time: 19.02
 */

namespace App\Http\Controllers\Android;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\EventMessages;
use App\Http\Model\Managers\AndroidTokenManager;


class TokenController extends Controller
{

    private $androidTokenManager;

    public function __construct()
    {
        $this->androidTokenManager = new AndroidTokenManager();
    }

    public function checkIfTokenShouldBeStored($token)
    {
        if (strlen($token) > 100)
        {
            $doesTokenExist =  $this->androidTokenManager->doesTokenExist($token);

            if (!$doesTokenExist) {
                $this->androidTokenManager->storeToken($token);
            }
        }
    }

}