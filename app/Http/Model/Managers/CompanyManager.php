<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 19.1.19.
 * Time: 21.25
 */

namespace App\Http\Model\Managers;

use Illuminate\Support\Facades\DB;


class CompanyManager
{

    public function storeCompany($name)
    {
        $companyID = DB::table('company')
            ->insertGetId
            ([
                'name' => $name
            ]);

        return $companyID;
    }

}