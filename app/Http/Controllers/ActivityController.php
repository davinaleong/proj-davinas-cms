<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        return view('activity.index', [
            'activities' => Activity::where('user_id', Auth::id())
                ->orderByDesc('created_at')
                ->paginate(Setting::getListPerPage())
        ]);
    }
}
