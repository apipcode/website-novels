<?php

namespace App\Http\Controllers;

use App\Services\MockDataService;

class NovelController extends Controller
{
    public function index()
    {
        return view('novel.index', [
            'novels' => MockDataService::getAllNovels(),
        ]);
    }

    public function show(string $slug)
    {
        return view('novel.show', [
            'novel' => MockDataService::getNovelDetails($slug),
        ]);
    }

    public function read(string $slug, int $chapter)
    {
        return view('novel.read', MockDataService::getChapterContent($slug, $chapter));
    }
}
