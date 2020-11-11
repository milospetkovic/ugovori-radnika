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
use Carbon\Carbon;


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
                'contract_end' => date('Y-m-d', strtotime($request->contract_end)),
                'jmbg' => ($request->jmbg) ? $request->jmbg : NULL,
                'inactive' => $request->inactive,
                'active_until_date' => ($request->active_until_date) ? date('Y-m-d', strtotime($request->active_until_date)) : NULL,
                'send_contract_ended_notification' => ($request->send_contract_ended_notification) ? 1 : 0,
                'description' => ($request->description) ? $request->description : NULL,
            ]);

        return $workerID;
    }

    public function countWorkers($fk_company=false, $onlyInactive=false)
    {
        if ($fk_company > 0) {
            if ($onlyInactive) {
                return DB::table(WorkerEntity::$tbl_name)->where('fk_company', $fk_company)->where('inactive', 1)->count();
            }
            return DB::table(WorkerEntity::$tbl_name)->where('fk_company', $fk_company)->count();
        }
        if ($onlyInactive) {
            return DB::table(WorkerEntity::$tbl_name)->where('inactive', 1)->count();
        }
        return DB::table(WorkerEntity::$tbl_name)->count();
    }

    public function returnAllWorkers()
    {
        return DB::table(WorkerEntity::$tbl_name)->get();
    }

    public function returnWorkersAndCompanies($companyID=null, $showUnactive=null)
    {
        $query = DB::table(WorkerEntity::$tbl_name.' as w ')
            ->leftJoin('company as c','c.id','=','w.fk_company')
            ->select([ "w.*", "c.id as company_id", "c.name as company_name" ]);
        if ($companyID > 0) {
            $query->where('fk_company', $companyID);
        }
        if ($showUnactive) {
            // show all
        } else {
            $query->whereNull('w.inactive');
        }
        $query->orderBy('w.contract_end', 'asc');
        return $query->get();
    }

    public function countWorkersWhichContractRunOut()
    {
        $sql = " SELECT COUNT(*) cnt from ".WorkerEntity::$tbl_name." where contract_end <= '".date('Y-m-d', (time() + 86400))."' AND (inactive <> 1 OR inactive IS NULL) AND send_contract_ended_notification >= 1";
        //print $sql;
        $res = DB::select($sql);
        return $res[0]->cnt;
    }

    public function getWorker($id)
    {
        return DB::table(WorkerEntity::$tbl_name.' as w ')
            ->leftJoin('company as c','c.id','=','w.fk_company')
            ->select([ "w.*", "c.id as company_id", "c.name as company_name" ])
            ->where('w.id', $id)->first();
    }


    public function updateWorker($request, $companyID, $workerID)
    {
        $res = DB::table(WorkerEntity::$tbl_name)->where('id', $workerID)
            ->update
            ([
                'fk_company' => $companyID,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'contract_start' => date('Y-m-d', strtotime($request->contract_start)),
                'contract_end' => date('Y-m-d', strtotime($request->contract_end)),
                'jmbg' => ($request->jmbg) ? $request->jmbg : NULL,
                'inactive' => $request->inactive,
                'active_until_date' => ($request->active_until_date) ? date('Y-m-d', strtotime($request->active_until_date)) : NULL,
                'send_contract_ended_notification' => ($request->send_contract_ended_notification) ? 1 : 0,
                'description' => ($request->description) ? $request->description : NULL,
            ]);

        return $res;
    }

    public function deleteWorker($id)
    {
        return DB::table(WorkerEntity::$tbl_name)->delete($id);
    }

    public function unactivateWorkersIfConditionIsFulfilled()
    {
        $sql = " SELECT COUNT(*) cnt from ".WorkerEntity::$tbl_name." where active_until_date IS NOT NULL AND active_until_date <= '".date('Y-m-d')."' AND (inactive != 1 OR inactive IS NULL)";
        $res = DB::select($sql);
        $cnt = $res[0]->cnt;

        if ($cnt) {
            $sql = " UPDATE ".WorkerEntity::$tbl_name." SET inactive=1 where active_until_date IS NOT NULL AND active_until_date <= '".date('Y-m-d')."' AND (inactive != 1 OR inactive IS NULL)";
            $res = DB::update($sql);
        }
        return $cnt;
    }

}