<?php

namespace App\Http\Controllers;

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
            return view('home', ['companies_count' => $countCompanies]);
        }
        return redirect()->route('/login');
    }
}
