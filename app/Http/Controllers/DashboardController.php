<?php

namespace App\Http\Controllers;
use App\Models\apiIntegrations;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $integrationData = apiIntegrations::all();
        // return $integrationData;
        return view('dashboard' , compact('integrationData'));
    }
}
