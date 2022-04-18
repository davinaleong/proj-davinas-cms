<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function post(Request $request)
    {
        $request->validate([
            'term' => 'nullable|string'
        ]);

        $term = request('term');

        return redirect(route('search.results', ['term' => $term]));
    }

    public function results(Request $request)
    {
        $term = $request->query('term');
        $searchResultsLimit = Setting::getSearchPerPage();

        return view('search.results', [
            'term' => $term,
            'pages' => Page::whereRaw("LOWER(name) LIKE LOWER('%$term%')")
                ->take($searchResultsLimit)
                ->get(),
            'posts' => Post::whereRaw("LOWER(name) LIKE LOWER('%$term%')")
                ->take($searchResultsLimit)
                ->get(),
        ]);
    }
}
