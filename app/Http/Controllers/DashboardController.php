<?php

namespace App\Http\Controllers;

use App\Services\MockDataService;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'library' => MockDataService::getUserLibrary(),
            'wallet' => MockDataService::getUserWallet(),
        ]);
    }
}
