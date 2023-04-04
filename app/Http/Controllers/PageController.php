<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function myActivity()
    {
        $activities = DB::table('authentication_log')
            ->where('authenticatable_id', '=', Auth::user()->id)
            ->orderBy('login_at', 'asc')
            ->limit(7)
            ->get();
        return view('pages.my-activity', compact('activities'));
    }

    public function notification()
    {
        return view('pages.notifications');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function trashed()
    {
        User::onlyTrashed();
        return view('pages.privacy');
    }
}
