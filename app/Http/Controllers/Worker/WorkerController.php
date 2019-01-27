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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $companyID)
    {
        $company = new CompanyManager();
        $companyObj = $company->getCompany($companyID);

        $data = [
                 'company_name' => $companyObj->name,
                 'company_id' => $companyObj->id ];

        return view('worker.create', $data);
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
            'contract_end'      => 'required|date'
        ]);

        $workerID = $this->workerManager->storeWorker($request, $companyID);

        if ($workerID > 0) {
            flash(EventMessages::ACTION_SUCCESS, "success");
            return $this->create($request, $companyID);
        }
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



}
