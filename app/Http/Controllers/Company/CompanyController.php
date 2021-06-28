<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Managers\CompanyManager;
use App\Helpers\EventMessages;
use App\Http\Model\Managers\WorkerManager;

class CompanyController extends Controller
{
    /**
     * @var CompanyManager
     */
    private $companyManager;

    /**
     * @var WorkerManager
     */
    private $workerManager;

    public function __construct()
    {
        $this->middleware('auth');

        $this->companyManager = new CompanyManager();
        $this->workerManager = new WorkerManager();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'name' => 'required|unique:company|max:128'
        ]);

        $name = $request->input('name');

        $companyID = $this->companyManager->storeCompany($name);

        flash(EventMessages::ACTION_SUCCESS, "success");

        return redirect()->action('App\Http\Controllers\Company\CompanyController@create');

        // use if redirect should be to the newly created company
        //return redirect()->action('Company\CompanyController@show', ['id' => $companyID]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $showinactive = $request->get('showinactive');

        $company = $this->companyManager->getCompany($id);

        $workers = $this->workerManager->returnWorkersAndCompanies($id, $showinactive)->toArray();

        $data['company'] = $company;

        return view('company.show', [  'showinactive' => $showinactive,
                                            'company' => $company,
                                            'workers' => $workers ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listCompanies()
    {
        $companies = $this->companyManager->returnAllCompanies()->toArray();
        $company_cnt_workers = [];
        $company_cnt_inactive_workers = [];
        $company_cnt_active_workers = [];

        if (is_array($companies) && count($companies)) {
            foreach ($companies as $comp) {
                $company_cnt_workers[$comp->id] = $this->workerManager->countWorkers($comp->id);
                $company_cnt_inactive_workers[$comp->id] = $this->workerManager->countWorkers($comp->id, 1);
                if ($company_cnt_inactive_workers[$comp->id]) {
                    $company_cnt_active_workers[$comp->id] = $company_cnt_workers[$comp->id] - $company_cnt_inactive_workers[$comp->id];
                }
            }
        }

        return view('company.list', [  'companies' => $companies,
                                            'company_cnt_workers' => $company_cnt_workers,
                                            'company_cnt_inactive_workers' => $company_cnt_inactive_workers,
                                            'company_cnt_active_workers' => $company_cnt_active_workers ]);
    }

    /**
     * Delete company
     *
     * @param Request $request
     * @param $id
     */
    public function delete(Request $request, $id)
    {
        $res = $this->companyManager->deleteCompany($id);

        if ($res > 0) {
            flash(EventMessages::ACTION_SUCCESS, "success");
            return redirect()->action('App\Http\Controllers\Company\CompanyController@listCompanies');
        }

        flash(EventMessages::ACTION_ERROR, "error");
            return redirect()->action('App\Http\Controllers\Company\CompanyController@show', $id);
    }



}
