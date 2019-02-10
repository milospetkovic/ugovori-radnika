<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 6.2.19.
 * Time: 19.15
 */

namespace App\Http\Model\Managers;

use Illuminate\Support\Facades\DB;
use App\Http\Model\Entity\AndroidToken as AndroidTokenEntity;
use Carbon\Carbon;


class AndroidTokenManager
{

    public function storeToken($token)
    {
        $tokenID = DB::table(AndroidTokenEntity::$tbl_name)
            ->insertGetId
            ([
                'token' => $token,
                'created_at' => Carbon::now('Europe/Belgrade')
            ]);

        return $tokenID;
    }

    public function doesTokenExist($token)
    {
        return DB::table(AndroidTokenEntity::$tbl_name)->where('token', $token)->count();
    }

    public function getAllTokens()
    {
        return DB::table(AndroidTokenEntity::$tbl_name)->get()->toArray();
    }

}