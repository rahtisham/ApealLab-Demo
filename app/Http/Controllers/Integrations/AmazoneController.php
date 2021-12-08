<?php

namespace App\Http\Controllers\Integrations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmazoneController extends Controller
{
    public function index()
    {
        return view('amazone');
    }

}
