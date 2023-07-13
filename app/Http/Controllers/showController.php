<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class showController extends Controller
{
    //view dashboard
    public function viewDashboard()
    {
        return view('dashboard');
    }
}
