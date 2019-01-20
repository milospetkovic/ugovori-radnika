<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 19.1.19.
 * Time: 21.25
 */

namespace App\Http\Model\Managers;

use Illuminate\Support\Facades\DB;
use App\Http\Model\Entity\Company as CompanyEntity;


class CompanyManager
{


    public function storeCompany($name)
    {
        $companyID = DB::table(CompanyEntity::$tbl_name)
            ->insertGetId
            ([
                'name' => $name
            ]);

        return $companyID;
    }

    public function returnAllCompanies()
    {
        return DB::table(CompanyEntity::$tbl_name)->get();
    }

}