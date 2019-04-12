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

    public function returnCountAllCompanies()
    {
        return DB::table(CompanyEntity::$tbl_name)->count();
    }


    public function getCompany($id)
    {
        $company = DB::table(CompanyEntity::$tbl_name)->where('id', $id)->first();
        return $company;
    }

    public function deleteCompany($id)
    {
        return DB::table(CompanyEntity::$tbl_name)->delete($id);
    }

}