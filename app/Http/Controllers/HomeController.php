<?php

namespace App\Http\Controllers;

use App\Http\Model\Managers\WorkerManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Http\Model\Managers\CompanyManager;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * If user is not logged redirect to the login form
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->id()) {

            $compManager = new CompanyManager();
            $countCompanies = $compManager->returnCountAllCompanies();
            if (!($countCompanies > 0)) {
                $countCompanies = 0;
            }


            $workerManager = new WorkerManager();
            $countWorkers = $workerManager->countWorkers();
            if (!($countWorkers > 0)) {
                $countWorkers = 0;
            }
            if ($countWorkers) {
                $countInactiveWorkers = $workerManager->countWorkers(null, 1);
            }
            if (!($countInactiveWorkers > 0)) {
                $countInactiveWorkers = 0;
            }
            return view('home', [ 'companies_count' => $countCompanies,
                                        'workers_count' => $countWorkers,
                                        'inactive_workers_count' => $countInactiveWorkers ]);
        }
        return redirect()->route('/login');
    }
}
