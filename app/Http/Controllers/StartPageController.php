<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class StartPageController extends Controller
{

    /**
     * StartPageController constructor.
     */
    public function __construct()
    {
        //$this->middleware = 'auth';
    }

    public function index()
    {
        //if (auth()->id()) {
            return view('start');
        //}

        //return redirect()->route('/login');
    }

}
