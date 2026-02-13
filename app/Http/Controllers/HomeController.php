<?php

namespace App\Http\Controllers;

use App\Services\MockDataService;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'featured' => MockDataService::getFeaturedNovels(),
            'rankings' => MockDataService::getRankings(),
            'newReleases' => MockDataService::getNewReleases(),
        ]);
    }
}
