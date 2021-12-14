<?php

namespace App\Http\Controllers;
use App\Models\apiIntegrations;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user_seesion_id = Auth()->user()->id;
        $integrationData = apiIntegrations::where('user_id' , $user_seesion_id)->get();
        return view('dashboard' , compact('integrationData'));
    }
}
