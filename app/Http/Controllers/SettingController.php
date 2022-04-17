<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index', [
            'settings' => Setting::paginate(Setting::getListPerPage())
        ]);
    }

    public function edit()
    {
        return view('setting.edit', [
            'settings' => Setting::all()
        ]);
    }
}
