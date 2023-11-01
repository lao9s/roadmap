<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Project;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->view('sitemap', [
            'projects' => Project::select('slug')->get(),
            'items' => Item::select('slug')->get(),
        ])->header('Content-Type', 'text/xml');
    }
}
