<?php

namespace App\Http\Controllers\Worker;

use App\Http\Model\Managers\CompanyManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Managers\WorkerManager;
use App\Helpers\EventMessages;

class WorkerController extends Controller
{

    /**
     * @var WorkerManager
     */
    private $workerManager;

    /**
     * WorkerController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->workerManager = new WorkerManager();
    }

    /**
     *
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listWorkers()
    {
        $workers = $this->workerManager->returnWorkersAndCompanies()->toArray();

        return view('worker.list', ['workers' => $workers,
                                          'extendLayout' => true ]);
    }

    /**
     * Show the view of the worker
     *
     */
    public function show(Request $request, $workerID)
    {
        $workerObj = $this->workerManager->getWorker($workerID);

        $data = [
            'view_type' => 'view',
            'id' => $workerObj->id,
            'first_name' => $workerObj->first_name,
            'last_name' => $workerObj->last_name,
            'contract_start' => $workerObj->contract_start,
            'contract_end' => $workerObj->contract_end,
            'company_id' => $workerObj->company_id,
            'company_name' => $workerObj->company_name,
            'jmbg' => $workerObj->jmbg,
            'status'=> ($workerObj->inactive) ? 'NEAKTIVAN' : 'Aktivan'
        ];

        return view('worker.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $companyID)
    {
        $company = new CompanyManager();
        $companyObj = $company->getCompany($companyID);

        $data = [
            'view_type' => 'create',
            'company_name' => $companyObj->name,
            'company_id' => $companyObj->id ];

        return view('worker.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $companyID)
    {
        $this->validate($request, [
            'fk_company'        => 'required|integer',
            'first_name'        => 'required|max:128',
            'last_name'         => 'required|max:128',
            'contract_start'    => 'required|date',
            'contract_end'      => 'required|date',
        ]);

        $workerID = $this->workerManager->storeWorker($request, $companyID);

        if ($workerID > 0) {
            flash(EventMessages::ACTION_SUCCESS, "success");
            return $this->show($request, $workerID);
        }

        return $this->create($request, $companyID);
    }

    /**
     * Show form for edit worker
     *
     * @param $companyID
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($companyID, $id)
    {
        $company = new CompanyManager();
        $companyObj = $company->getCompany($companyID);

        $workerObj = $this->workerManager->getWorker($id);

        $data = [ 'view_type' => 'edit',
                  'id' => $workerObj->id,
                  'first_name' => $workerObj->first_name,
                  'last_name' => $workerObj->last_name,
                  'contract_start' => $workerObj->contract_start,
                  'contract_end' => $workerObj->contract_end,
                  'company_name' => $companyObj->name,
                  'company_id' => $companyObj->id,
                  'jmbg' => $workerObj->jmbg,
                  'status'=> ($workerObj->inactive) ? 'NEAKTIVAN' : 'Aktivan',
                  'status_val' => $workerObj->inactive
        ];

        return view('worker.index', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $companyID, $id)
    {
        $this->validate($request, [
            'fk_company'        => 'required|integer',
            'first_name'        => 'required|max:128',
            'last_name'         => 'required|max:128',
            'contract_start'    => 'required|date',
            'contract_end'      => 'required|date'
        ]);

        $workerID = $this->workerManager->updateWorker($request, $companyID, $id);

        if ($workerID > 0) {
            flash(EventMessages::ACTION_SUCCESS, "success");
            return $this->show($request, $id);
        }
    }

}
