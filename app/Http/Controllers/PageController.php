<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Setting;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index', [
            'pages' => Page::orderByDesc('created_at')
                ->paginate(Setting::getListPerPage()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create', [
            'user_name' => Auth::user()->name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
        ]);

        $page = Page::create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
        ]);

        Activity::create([
            'user_id' => Auth::id(),
            'message' => 'Page ' . $page->name . ' created.',
            'label' => 'View Page',
            'link' => route('pages.show', ['page' => $page])
        ]);

        return redirect(route('pages.show', ['page' => $page]))
            ->with('message', 'Page created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('pages.show', [
            'page' => $page
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('pages.edit', [
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
        ]);

        $page->user_id = Auth::id();
        $page->name = $request->input('name');
        $page->title = $request->input('title');
        $page->subtitle = $request->input('subtitle');
        $page->meta_title = $request->input('meta_title');
        $page->meta_description = $request->input('meta_description');
        $page->save();

        Activity::create([
            'user_id' => Auth::id(),
            'message' => 'Page ' . $page->name . ' modified.',
            'label' => 'View Page',
            'link' => route('pages.show', ['page' => $page])
        ]);

        return redirect(route('pages.show', ['page' => $page]))
            ->with('message', 'Page modified.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page_name = $page->name;
        $page->delete();

        Activity::create([
            'user_id' => Auth::id(),
            'message' => 'Page ' . $page->name . ' deleted.'
        ]);

        return redirect(route('pages.index'))
            ->with('message', 'Page deleted.');
    }
}
