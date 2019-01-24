<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 23.1.19.
 * Time: 12.33
 */

namespace App\Http\Model\Managers;

use Illuminate\Support\Facades\DB;
use App\Http\Model\Entity\Worker as WorkerEntity;


class WorkerManager
{

    public function storeWorker($request, $companyID)
    {
        $workerID = DB::table(WorkerEntity::$tbl_name)
            ->insertGetId
            ([
                'fk_company' => $companyID,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'contract_start' => date('Y-m-d', strtotime($request->contract_start)),
                'contract_end' => date('Y-m-d', strtotime($request->contract_end))
            ]);

        return $workerID;
    }

    public function countWorkers($fk_company=false)
    {
        if ($fk_company > 0) {
            return DB::table(WorkerEntity::$tbl_name)->where('fk_company', $fk_company)->count();
        }
        return DB::table(WorkerEntity::$tbl_name)->count();
    }



}