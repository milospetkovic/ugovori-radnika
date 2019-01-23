<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'fk_company'        => 'required|integer',
            'first_name'        => 'required|max:128',
            'last_name'         => 'required|max:128',
            'contract_start'    => 'required|date',
            'contract_end'      => 'required|date'
        ]);

        $workerID = $this->workerManager->storeWorker();

        if ($workerID > 0) {
            flash(EventMessages::ACTION_SUCCESS, "success");
        }

        return redirect()->action('Worker\WorkerController@store');

        // use if redirect should be to the newly created company
        //return redirect()->action('Company\CompanyController@show', ['id' => $companyID]);
    }
}
