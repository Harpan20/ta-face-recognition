<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // temporary
        return redirect('visions');
        return view('pages.dashboard');
    }
}
