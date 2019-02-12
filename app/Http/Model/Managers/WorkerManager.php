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

    public function returnAllWorkers()
    {
        return DB::table(WorkerEntity::$tbl_name)->get();
    }

    public function returnWorkersAndCompanies($companyID=null)
    {
        $query = DB::table(WorkerEntity::$tbl_name.' as w ')
            ->leftJoin('company as c','c.id','=','w.fk_company')
            ->select([ "w.*", "c.id as company_id", "c.name as company_name" ]);
        if ($companyID > 0) {
            $query->where('fk_company', $companyID);
        }
        $query->orderBy('w.contract_end', 'asc');
        return $query->get();
    }

    public function countWorkersWhichContractRunOut()
    {
        return DB::table(WorkerEntity::$tbl_name)->where('contract_end', '<=', date('Y-m-d', (time() + 86400)))->count();
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
        $workerID = DB::table(WorkerEntity::$tbl_name)->where('id', $workerID)
            ->update
            ([
                'fk_company' => $companyID,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'contract_start' => date('Y-m-d', strtotime($request->contract_start)),
                'contract_end' => date('Y-m-d', strtotime($request->contract_end))
            ]);

        return $workerID;
    }


    public function updateInquiry($data, $userID, $entity)
    {
        $inquiryID = $data['object_id'];

        DB::table('elb_inquiry')->where('rowid', '=', $inquiryID)->update([

            'ref_client' => $data['documentnumber'],
            'entity' => $entity,
            'fk_soc' => $data['customer'],
            'fk_projet' => $data['project'],
            'datep' => (string)date("Y-m-d", strtotime($data['requestdate'])),
            'fk_input_reason' => $data['source'],
            'fk_cond_reglement' => $data['paymentterms'],
            'fk_incoterms' => $data['incoterms'],
            'location_incoterms' => $data['location_incoterms'],
            'note_public' => $data['notepublic'],
            'note_private' => $data['noteprivate'],
            'fk_currency' => $data['currency'],
            'fk_user_modif' => $userID
        ]);
    }

}