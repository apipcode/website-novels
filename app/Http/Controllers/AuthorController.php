<?php

namespace App\Http\Controllers;

use App\Services\MockDataService;

class AuthorController extends Controller
{
    public function index()
    {
        $data = MockDataService::getAuthorNovels();

        return view('author.index', [
            'stats' => $data['stats'],
            'novels' => $data['novels'],
        ]);
    }
}
