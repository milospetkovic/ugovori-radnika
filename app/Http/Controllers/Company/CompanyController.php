<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Managers\CompanyManager;
use App\Helpers\EventMessages;

class CompanyController extends Controller
{
    /**
     * @var CompanyManager
     */
    private $companyManager;

    public function __construct()
    {
        $this->middleware('auth');

        $this->companyManager = new CompanyManager();
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

        return redirect()->action('Company\CompanyController@create');

        // use if redirect should be to the newly created company
        //return redirect()->action('Company\CompanyController@show', ['id' => $companyID]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $companies = $this->companyManager->returnAllCompanies();

        return view('company.list', ['companies' => $companies]);
    }
}
