<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index()
    {
        return view('marketplace.index');
    }
}
