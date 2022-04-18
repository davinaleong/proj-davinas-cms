<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.index', [
            'settings' => Setting::paginate(Setting::getListPerPage()),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('settings.edit', [
            'settings' => Setting::all(),
            'settings_count' => Setting::count()
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
            'names' => 'required|array',
            'names.*' => 'nullable|string',
            'keys' => 'required|array',
            'keys.*' => 'nullable|string',
            'values' => 'required|array',
            'values.*' => 'nullable|string',
        ]);

        Setting::where('user_id', Auth::id())->delete();

        $nameCount = count($request->input('names'));
        $keyCount = count($request->input('keys'));
        $valueCount = count($request->input('values'));
        $minCount = min([$nameCount, $keyCount, $valueCount]);

        for ($i = 0; $i < $minCount; $i++) {
            Setting::create([
                'user_id' => Auth::id(),
                'name' => $request->input("names.{$i}"),
                'key' => $request->input("keys.{$i}"),
                'value' => $request->input("values.{$i}"),
            ]);
        }

        Activity::create([
            'user_id' => Auth::id(),
            'message' => 'Settings modified.',
            'label' => 'View Settings',
            'link' => route('settings.index')
        ]);

        return redirect(route('settings.index'))->with('message', 'You have modified settings.');
    }
}
