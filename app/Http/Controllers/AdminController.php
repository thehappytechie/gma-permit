<?php

namespace App\Http\Controllers;

use App\Models\BrandSetting;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:superuser');
    }

    public function settings()
    {
        $brandSetting = BrandSetting::first();
        return view('pages.settings', compact('brandSetting'));
    }
}
