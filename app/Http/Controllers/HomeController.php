<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

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
            return view('home');
        }
        return redirect()->route('/login');
    }
}
